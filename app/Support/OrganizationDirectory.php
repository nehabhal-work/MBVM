<?php

namespace App\Support;

use App\Http\Controllers\MemberController;
use App\Models\Member;
use Illuminate\Support\Collection;

/**
 * Single source for the "स्थानिक संघटना" numbers and the "जिल्हानिहाय माहिती" directory,
 * so the public home page and the ERP always show the same counts.
 */
class OrganizationDirectory
{
    /** Member counts grouped by district + taluka. */
    public static function areas(): Collection
    {
        return Member::query()
            ->select('jilha', 'taluka')
            ->selectRaw('COUNT(*) as registration_count')
            ->whereNotNull('jilha')
            ->where('jilha', '!=', '')
            ->groupBy('jilha', 'taluka')
            ->orderBy('jilha')
            ->orderBy('taluka')
            ->get();
    }

    /** One entry per district that has at least one registration. */
    public static function districts(?Collection $areas = null): Collection
    {
        $areas ??= self::areas();

        return $areas
            ->groupBy('jilha')
            ->map(function ($rows, $district) {
                $count = (int) $rows->sum('registration_count');

                return [
                    'name'               => $district,
                    'talukas'            => $rows->pluck('taluka')->filter()->unique()->values(),
                    'registration_count' => $count,
                    'status'             => $count >= MemberController::DISTRICT_THRESHOLD ? 'threshold-reached' : 'registering',
                ];
            })
            ->values();
    }

    /** The four headline numbers shown on the home page. */
    public static function stats(?Collection $districts = null): array
    {
        $districts ??= self::districts();

        return [
            'districts'         => $districts->count(),
            'threshold_reached' => $districts->where('status', 'threshold-reached')->count(),
            'registering'       => $districts->where('status', 'registering')->count(),
            'registrations'     => (int) $districts->sum('registration_count'),
        ];
    }

    /** Apply the public filters (district / taluka / status). */
    public static function filter(Collection $districts, string $district = '', string $taluka = '', string $status = ''): Collection
    {
        return $districts
            ->when($district !== '', fn ($c) => $c->where('name', $district))
            ->when($taluka !== '', fn ($c) => $c->filter(fn ($d) => $d['talukas']->contains($taluka)))
            ->when($status !== '', fn ($c) => $c->where('status', $status))
            ->values();
    }
}
