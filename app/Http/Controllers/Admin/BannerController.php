<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading'    => ['required', 'string', 'max:255'],
            'image'      => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
        ], $this->messages());

        Banner::create([
            'heading'    => $validated['heading'],
            'image'      => $request->file('image')->store('banners', 'public'),
            'sort_order' => $validated['sort_order'] ?? ((int) Banner::max('sort_order') + 1),
            'is_active'  => true,
        ]);

        return $this->back('नवीन बॅनर जोडला व मुख्यपृष्ठावर सुरू केला.');
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'heading'    => ['required', 'string', 'max:255'],
            'image'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:999'],
        ], $this->messages());

        $data = [
            'heading'    => $validated['heading'],
            'sort_order' => $validated['sort_order'] ?? $banner->sort_order,
        ];

        if ($request->hasFile('image')) {
            $banner->deleteImageFile();
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($data);

        return $this->back('बॅनर अद्ययावत केला.');
    }

    public function toggle(Banner $banner)
    {
        $banner->update(['is_active' => !$banner->is_active]);

        return $this->back($banner->is_active ? 'बॅनर सुरू (Active) केला.' : 'बॅनर बंद (Inactive) केला.');
    }

    public function destroy(Banner $banner)
    {
        $banner->deleteImageFile();
        $banner->delete();

        return $this->back('बॅनर हटवला.');
    }

    private function messages(): array
    {
        return [
            'image.required' => 'कृपया बॅनर प्रतिमा निवडा.',
            'image.image'    => 'बॅनर फक्त प्रतिमा (JPG, PNG, WEBP) असावा.',
            'image.max'      => 'प्रतिमा ५ MB पेक्षा मोठी नसावी.',
        ];
    }

    private function back(string $message)
    {
        return redirect()->route('admin.users.index', ['tab' => 'banners'])->with('success', $message);
    }
}
