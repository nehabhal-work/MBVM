<?php

namespace App\Http\Controllers;

use App\Mail\DistrictThresholdMail;
use App\Models\DistrictNotification;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MemberController extends Controller
{
    const DISTRICT_THRESHOLD = 15;
    public function index(Request $request)
    {
        $query = Member::query();

        if ($request->filled('jilha')) {
            $query->where('jilha', $request->jilha);
        }
        if ($request->filled('taluka')) {
            $query->where('taluka', 'like', '%' . $request->taluka . '%');
        }
        if ($request->filled('city')) {
            $query->where('city', $request->city);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('company_name', 'like', "%{$search}%");
            });
        }

        $members = $query->latest()->paginate(20)->withQueryString();

        $districtCounts = Member::selectRaw('jilha, COUNT(*) as total')
            ->groupBy('jilha')
            ->orderByDesc('total')
            ->get();

        $allJilhas = Member::select('jilha')->distinct()->orderBy('jilha')->pluck('jilha');
        $allCities = Member::select('city')->distinct()->orderBy('city')->pluck('city');

        return view('members.index', compact('members', 'districtCounts', 'allJilhas', 'allCities'));
    }
    // Show the public form
    public function create()
    {
        $districts = \App\Models\District::orderBy('name')->get(['id', 'name']);
        $cities = \App\Models\City::orderBy('name')->pluck('name');

        return view('members.create', compact('districts', 'cities'));
    }


    // Validate, store, and check district threshold
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => ['required', 'string', 'max:100', 'regex:/^[\pL\s.]+$/u'],
            'mobile'       => ['required', 'digits:10', 'numeric'],
            'email'        => ['required', 'email', 'max:150'],
            'jilha'        => ['required', 'string', 'max:100'],
            'taluka'       => ['required', 'string', 'max:100'],
            'city'         => ['required', 'string', 'max:100'],
            'company_name' => ['required', 'string', 'max:150'],
        ], [
            'mobile.digits' => 'मोबाईल नंबर बरोबर १० अंकी असावा.',
            'mobile.numeric' => 'मोबाईल नंबरमध्ये फक्त आकडे असावेत.',
            'required' => 'ही माहिती भरणे आवश्यक आहे.',
            'email.email' => 'कृपया योग्य ई-मेल टाका.',
        ]);

        Member::create($validated);

        $this->checkDistrictThreshold($validated['jilha']);

        return redirect()
            ->route('members.create')
            ->with('success', 'तुमची नोंदणी यशस्वीरित्या झाली आहे!');
    }



    private function checkDistrictThreshold(string $jilha): void
    {
        $count = Member::where('jilha', $jilha)->count();

        if ($count >= self::DISTRICT_THRESHOLD) {
            $alreadyNotified = DistrictNotification::where('jilha', $jilha)->exists();

            if (!$alreadyNotified) {
                Mail::to(config('mail.admin_notify_email'))
                    ->send(new DistrictThresholdMail($jilha, $count));

                DistrictNotification::create([
                    'jilha' => $jilha,
                    'member_count_at_trigger' => $count,
                    'notified_at' => now(),
                ]);
            }
        }
    }
}
