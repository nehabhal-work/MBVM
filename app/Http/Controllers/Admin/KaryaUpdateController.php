<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KaryaUpdate;
use Illuminate\Http\Request;

class KaryaUpdateController extends Controller
{
    public function store(Request $request)
    {
        $validated = $this->validated($request);
        $wantsHome = $request->boolean('show_on_home');
        $homeFull = $wantsHome && $this->homeIsFull();
        $showOnHome = $wantsHome && !$homeFull;

        KaryaUpdate::create($validated + [
            'is_active'    => true,
            'show_on_home' => $showOnHome,
            'home_order'   => $validated['home_order'] ?? ($showOnHome ? $this->nextHomeOrder() : 0),
        ]);

        return $homeFull
            ? $this->back(null, 'घडामोड कार्य पानावर जोडली, पण होम पेजवर आधीच ' . KaryaUpdate::HOME_LIMIT . ' घडामोडी आहेत. होम पेजवर दाखवण्यासाठी आधी एखादी काढा.')
            : $this->back($showOnHome ? 'नवीन घडामोड जोडली व होम पेजवर दाखवली.' : 'नवीन घडामोड जोडली.');
    }

    public function update(Request $request, KaryaUpdate $karya)
    {
        $validated = $this->validated($request);
        $validated['home_order'] ??= $karya->home_order;

        $karya->update($validated);

        return $this->back('घडामोड अद्ययावत केली.');
    }

    /** Active / Inactive — inactive updates are hidden from both /karya and the home page. */
    public function toggle(KaryaUpdate $karya)
    {
        $karya->update(['is_active' => !$karya->is_active]);

        return $this->back($karya->is_active ? 'घडामोड सुरू (Active) केली.' : 'घडामोड बंद (Inactive) केली.');
    }

    /** Add to / remove from the home page "आमचे कार्य" section. */
    public function toggleHome(KaryaUpdate $karya)
    {
        if (!$karya->show_on_home && $this->homeIsFull()) {
            return $this->back(null, 'होम पेजवर फक्त ' . KaryaUpdate::HOME_LIMIT . ' घडामोडी दिसतात. आधी एखादी होम पेजवरून काढा.');
        }

        $karya->update([
            'show_on_home' => !$karya->show_on_home,
            'home_order'   => $karya->show_on_home ? $karya->home_order : $this->nextHomeOrder(),
            'is_active'    => $karya->show_on_home ? $karya->is_active : true, // shown on home ⇒ must be active
        ]);

        return $this->back($karya->show_on_home ? 'घडामोड होम पेजवर दाखवली.' : 'घडामोड होम पेजवरून काढली.');
    }

    public function destroy(KaryaUpdate $karya)
    {
        $karya->delete();

        return $this->back('घडामोड हटवली.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'event_date' => ['required', 'date'],
            'category'   => ['required', 'string', 'max:100'],
            'title'      => ['required', 'string', 'max:255'],
            'excerpt'    => ['nullable', 'string', 'max:1000'],
            'authority'  => ['nullable', 'string', 'max:255'],
            'outcome'    => ['nullable', 'string', 'max:100'],
            'home_order' => ['nullable', 'integer', 'min:0', 'max:999'],
        ], [
            'event_date.required' => 'कृपया दिनांक निवडा.',
            'category.required'   => 'कृपया प्रकार निवडा.',
            'title.required'      => 'कृपया शीर्षक लिहा.',
        ]);
    }

    private function homeIsFull(): bool
    {
        return KaryaUpdate::where('is_active', true)->where('show_on_home', true)->count() >= KaryaUpdate::HOME_LIMIT;
    }

    private function nextHomeOrder(): int
    {
        return (int) KaryaUpdate::where('show_on_home', true)->max('home_order') + 1;
    }

    private function back(?string $success, ?string $error = null)
    {
        $redirect = redirect()->route('admin.users.index', ['tab' => 'karya']);

        return $error ? $redirect->with('error', $error) : $redirect->with('success', $success);
    }
}
