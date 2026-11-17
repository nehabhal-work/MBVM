<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class KaryaUpdate extends Model
{
    /** How many updates the home page "आमचे कार्य" section shows. */
    public const HOME_LIMIT = 3;

    /** Category => Font Awesome icon (used on the home page cards). */
    public const CATEGORIES = [
        'शासनाकडे निवेदने'      => 'fa-landmark',
        'प्राधिकरणांशी बैठका'   => 'fa-handshake',
        'कार्यक्रम'             => 'fa-people-group',
        'नियामक बाबी'           => 'fa-scale-balanced',
        'स्थानिक संघटना उपक्रम' => 'fa-people-roof',
    ];

    public const OUTCOMES = ['सादर', 'बैठक झाली', 'प्रलंबित', 'मंजूर', 'पूर्ण'];

    private const MONTHS = ['जानेवारी', 'फेब्रुवारी', 'मार्च', 'एप्रिल', 'मे', 'जून', 'जुलै', 'ऑगस्ट', 'सप्टेंबर', 'ऑक्टोबर', 'नोव्हेंबर', 'डिसेंबर'];

    protected $fillable = ['event_date', 'category', 'title', 'excerpt', 'authority', 'outcome', 'is_active', 'show_on_home', 'home_order'];

    protected $casts = [
        'event_date'   => 'date',
        'is_active'    => 'boolean',
        'show_on_home' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderByDesc('event_date')->orderByDesc('id');
    }

    /**
     * Updates for the home page: the ones marked "होम पेजवर दाखवा" (in their order);
     * if fewer are marked, the latest active updates fill the remaining places.
     */
    public static function forHome(): Collection
    {
        $featured = self::where('is_active', true)->where('show_on_home', true)
            ->orderBy('home_order')->orderByDesc('event_date')
            ->take(self::HOME_LIMIT)->get();

        if ($featured->count() < self::HOME_LIMIT) {
            $featured = $featured->concat(
                self::active()->whereNotIn('id', $featured->pluck('id'))
                    ->take(self::HOME_LIMIT - $featured->count())->get()
            );
        }

        return $featured->values();
    }

    /** Marathi date, e.g. "२८ सप्टेंबर २०२६" (views use $update['date']). */
    public function getDateAttribute(): string
    {
        if (!$this->event_date) {
            return '';
        }

        $text = $this->event_date->format('d') . ' ' . self::MONTHS[$this->event_date->month - 1] . ' ' . $this->event_date->format('Y');

        return strtr($text, ['0' => '०', '1' => '१', '2' => '२', '3' => '३', '4' => '४', '5' => '५', '6' => '६', '7' => '७', '8' => '८', '9' => '९']);
    }

    public function getIconAttribute(): string
    {
        return self::CATEGORIES[$this->category] ?? 'fa-newspaper';
    }
}
