<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MemberController;
use App\Models\District;
use App\Models\Member;
use App\Models\SandhiListing;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public const TABS = [
        'dashboard' => 'डॅशबोर्ड',
        'members'   => 'नोंदण्या',
        'districts' => 'स्थानिक संघटना',
        'sandhi'    => 'संधी व जाहिराती',
        'settings'  => 'सेटिंग्ज',
    ];

    public function index(Request $request)
    {
        $tab = array_key_exists($request->query('tab'), self::TABS) ? $request->query('tab') : 'members';
        $threshold = MemberController::DISTRICT_THRESHOLD;

        // District-wise counts (used by dashboard + local organisations tab)
        $districtCounts = Member::selectRaw('jilha, COUNT(*) as total, COUNT(DISTINCT taluka) as talukas')
            ->groupBy('jilha')
            ->orderByDesc('total')
            ->get();

        $stats = [
            'members'           => Member::count(),
            'districts'         => $districtCounts->count(),
            'threshold_reached' => $districtCounts->where('total', '>=', $threshold)->count(),
            'users'             => User::count(),
            'this_month'        => Member::where('created_at', '>=', now()->startOfMonth())->count(),
            'verified'          => Member::where('status', 'verified')->count(),
            'pending'           => Member::where('status', 'pending')->count(),
        ];

        $data = compact('tab', 'threshold', 'districtCounts', 'stats');

        if ($tab === 'dashboard') {
            $data['recentMembers'] = Member::latest()->take(5)->get();
            $data['businessTypeCounts'] = Member::selectRaw('business_type, COUNT(*) as total')
                ->groupBy('business_type')
                ->orderByDesc('total')
                ->get();
        }

        if ($tab === 'members') {
            $data['members'] = $this->memberQuery($request)->latest()->paginate(20)->withQueryString();
            // All districts from master table (+ any extra names already present on members)
            $data['allJilhas'] = District::orderBy('name')->pluck('name')
                ->merge(Member::select('jilha')->distinct()->pluck('jilha'))
                ->filter()->unique()->sort()->values();
            $data['businessTypes'] = Member::whereNotNull('business_type')
                ->select('business_type')->distinct()->orderBy('business_type')->pluck('business_type');
        }

        if ($tab === 'districts') {
            $counts = Member::selectRaw("jilha,
                    COUNT(*) as total,
                    COUNT(DISTINCT taluka) as talukas,
                    SUM(status = 'verified') as verified,
                    MAX(created_at) as last_at")
                ->groupBy('jilha')
                ->get()
                ->keyBy('jilha');

            // Every district (master table + any extra names on members), with its counts
            $rows = District::orderBy('name')->pluck('name')
                ->merge($counts->keys())
                ->unique()
                ->map(function ($name) use ($counts, $threshold) {
                    $c = $counts->get($name);
                    $total = (int) ($c->total ?? 0);

                    return (object) [
                        'jilha'    => $name,
                        'total'    => $total,
                        'talukas'  => (int) ($c->talukas ?? 0),
                        'verified' => (int) ($c->verified ?? 0),
                        'last_at'  => $c?->last_at ? \Illuminate\Support\Carbon::parse($c->last_at) : null,
                        'state'    => $total >= $threshold ? 'forming' : ($total > 0 ? 'registering' : 'none'),
                    ];
                })
                ->sortBy([['total', 'desc'], ['jilha', 'asc']])
                ->values();

            $data['districtSummary'] = [
                'all'         => $rows->count(),
                'forming'     => $rows->where('state', 'forming')->count(),
                'registering' => $rows->where('state', 'registering')->count(),
                'none'        => $rows->where('state', 'none')->count(),
            ];

            $filter = $request->query('state');
            $data['districtRows'] = in_array($filter, ['forming', 'registering', 'none'], true)
                ? $rows->where('state', $filter)->values()
                : $rows;

            // Members grouped by district, for the expandable list under each row
            $data['membersByJilha'] = Member::orderByDesc('created_at')
                ->get(['id', 'name', 'mobile', 'taluka', 'city', 'business_type', 'status', 'jilha', 'created_at'])
                ->groupBy('jilha');
        }

        if ($tab === 'sandhi') {
            $data['listings'] = SandhiListing::query()
                ->when(array_key_exists((string) $request->status, SandhiListing::STATUSES),
                    fn ($q) => $q->where('status', $request->status))
                ->orderByRaw("FIELD(status, 'under_review', 'submitted', 'approved', 'paused', 'rejected')")
                ->latest()
                ->paginate(20)
                ->withQueryString();
        }

        if ($tab === 'settings') {
            $users = User::query();
            if ($request->filled('search')) {
                $search = $request->search;
                $users->where(fn ($q) => $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%"));
            }
            $data['users'] = $users->latest()->paginate(20)->withQueryString();
        }

        return view('admin.user-index', $data);
    }

    public function exportMembers(Request $request)
    {
        $members = $this->memberQuery($request)->latest()->get();
        $filename = 'mbvm-registrations-' . now()->format('Y-m-d') . '.csv';

        return response()->streamDownload(function () use ($members) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF"); // UTF-8 BOM so Excel shows Marathi correctly

            fputcsv($out, ['क्र.', 'नाव', 'मोबाईल', 'ई-मेल', 'जिल्हा', 'तालुका', 'शहर', 'गाव',
                'कंपनी', 'प्रकार', 'MahaRERA', 'वेबसाइट', 'संपर्क संमती', 'खात्री', 'नोंदणी दिनांक']);

            foreach ($members as $m) {
                fputcsv($out, [
                    'MB' . (100000 + $m->id), $m->name, $m->mobile, $m->email, $m->jilha, $m->taluka,
                    $m->city, $m->village, $m->company_name, $m->business_type, $m->maharera_number,
                    $m->website, $m->contact_consent ? 'होय' : 'नाही', Member::STATUSES[$m->status] ?? $m->status, $m->created_at?->format('d-m-Y H:i'),
                ]);
            }

            fclose($out);
        }, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    public function updateMemberStatus(Request $request, Member $member)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(array_keys(Member::STATUSES))],
        ]);

        $member->update($validated);

        return back()->with('success', $member->name . ' — स्थिती अद्ययावत केली.');
    }

    private function memberQuery(Request $request): Builder
    {
        return Member::query()
            ->when($request->filled('jilha'), fn ($q) => $q->where('jilha', $request->jilha))
            ->when($request->filled('business_type'), fn ($q) => $q->where('business_type', $request->business_type))
            ->when(array_key_exists((string) $request->status, Member::STATUSES), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('q'), function ($q) use ($request) {
                $s = $request->q;
                $q->where(fn ($w) => $w->where('name', 'like', "%{$s}%")
                    ->orWhere('mobile', 'like', "%{$s}%")
                    ->orWhere('email', 'like', "%{$s}%")
                    ->orWhere('company_name', 'like', "%{$s}%")
                    ->orWhere('city', 'like', "%{$s}%"));
            });
    }
}
