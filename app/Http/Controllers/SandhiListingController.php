<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\SandhiListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class SandhiListingController extends Controller
{
    // ---------- PUBLIC: submit from sandhi page ----------
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:150'],
            'mobile'      => ['required', 'digits:10'],
            'email'       => ['required', 'email', 'max:150'],
            'type'        => ['required', Rule::in(SandhiListing::TYPES)],
            'district'    => ['required', 'exists:districts,id'],
            'taluka'      => ['required', 'string', 'max:100'],
            'location'    => ['required', 'string', 'max:255'],
            'area'        => ['required', 'string', 'max:100'],
            'map'         => ['nullable', 'url', 'max:500'],
            'brief'       => ['required', 'string', 'max:3000'],
            'terms'       => ['nullable', 'string', 'max:3000'],
            'documents'   => ['nullable', 'array', 'max:5'],
            'documents.*' => ['file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:5120'],
            'agree'       => ['accepted'],
        ], [
            'documents.*.mimes' => 'कागदपत्रे फक्त JPG, PNG, WEBP किंवा PDF स्वरूपात असावीत.',
            'documents.*.max'   => 'प्रत्येक फाईल ५ MB पेक्षा मोठी नसावी.',
            'agree.accepted'    => 'कृपया नियम व अटी मान्य करा.',
        ]);

        $paths = [];
        foreach ($request->file('documents', []) as $file) {
            $paths[] = $file->store('sandhi', 'public');
        }

        SandhiListing::create([
            'name'      => $validated['name'],
            'mobile'    => $validated['mobile'],
            'email'     => $validated['email'],
            'type'      => $validated['type'],
            'district'  => District::find($validated['district'])->name,
            'taluka'    => $validated['taluka'],
            'location'  => $validated['location'],
            'area'      => $validated['area'],
            'map_url'   => $validated['map'] ?? null,
            'brief'     => $validated['brief'],
            'terms'     => $validated['terms'] ?? null,
            'documents' => $paths,
        ]);

        return redirect()->to(route('sandhi.index') . '#nondava')
            ->with('sandhi_success', 'तुमची संधी सादर झाली. महासंघ तपासणीनंतर शुल्क व मान्यतेबाबत तुम्हाला संपर्क केला जाईल.');
    }

    // ---------- ADMIN actions ----------
    public function approve(SandhiListing $listing)
    {
        $listing->update([
            'status'         => 'approved',
            'approved_until' => today()->addDays(SandhiListing::PUBLISH_DAYS),
        ]);

        return $this->back($listing, 'मान्यता दिली — ' . $listing->approved_until->format('d-m-Y') . ' पर्यंत प्रसिद्ध.');
    }

    public function reject(SandhiListing $listing)
    {
        $listing->update(['status' => 'rejected']);

        return $this->back($listing, 'नाकारले.');
    }

    public function pause(SandhiListing $listing)
    {
        $listing->update(['status' => 'paused']);

        return $this->back($listing, 'प्रसिद्धी थांबवली.');
    }

    public function review(SandhiListing $listing)
    {
        $listing->update(['status' => 'under_review']);

        return $this->back($listing, 'तपासणीसाठी घेतले.');
    }

    public function markPaid(Request $request, SandhiListing $listing)
    {
        $validated = $request->validate([
            'fee'         => ['required', 'integer', 'min:0', 'max:10000000'],
            'payment_ref' => ['nullable', 'string', 'max:100'],
        ]);

        $listing->update($validated + [
            'payment_status' => 'paid',
            'status'         => $listing->status === 'submitted' ? 'under_review' : $listing->status,
        ]);

        return $this->back($listing, 'शुल्क Paid नोंदवले.');
    }

    public function remind(SandhiListing $listing)
    {
        $fee = $listing->fee ? '₹' . number_format($listing->fee) : 'प्रशासन-निर्धारित शुल्क';

        try {
            Mail::raw(
                "नमस्कार {$listing->name},\n\n"
                . "तुमच्या \"{$listing->type}\" ({$listing->district} · {$listing->taluka}) सूचीसाठी {$fee} नोंदणी शुल्क अद्याप प्रलंबित आहे. "
                . "शुल्क भरल्यानंतर महासंघ तपासणी करून सूची प्रसिद्ध केली जाईल.\n\n"
                . "— मराठी बांधकाम व्यावसायिक महासंघ",
                fn ($m) => $m->to($listing->email)->subject('सूची शुल्क स्मरण — MBVM')
            );
        } catch (\Throwable $e) {
            report($e);

            return $this->back($listing, 'स्मरण ई-मेल पाठवता आला नाही: ' . $e->getMessage(), 'error');
        }

        return $this->back($listing, 'पेमेंट स्मरण ई-मेल पाठवला.');
    }

    private function back(SandhiListing $listing, string $message, string $key = 'success')
    {
        return redirect()->route('admin.users.index', ['tab' => 'sandhi'])
            ->with($key, $listing->name . ' — ' . $message);
    }
}
