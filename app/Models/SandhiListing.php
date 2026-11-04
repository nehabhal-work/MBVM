<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SandhiListing extends Model
{
    public const TYPES = [
        'जमीन JV/JD साठी उपलब्ध',
        'जमीनमालक विकासक शोधत आहे',
        'विकास भागीदार हवा',
        'गुंतवणूकदार / विकासक संधी',
        'पुनर्विकास संधी',
    ];

    public const STATUSES = [
        'submitted'    => 'Submitted',
        'under_review' => 'Under review',
        'approved'     => 'Approved',
        'rejected'     => 'Rejected',
        'paused'       => 'Paused',
    ];

    /** How long an approved listing stays published. */
    public const PUBLISH_DAYS = 30;

    protected $fillable = [
        'name', 'mobile', 'email', 'type', 'district', 'taluka', 'location', 'area',
        'map_url', 'brief', 'terms', 'documents',
        'fee', 'payment_status', 'payment_ref', 'status', 'approved_until',
    ];

    protected $casts = [
        'documents'      => 'array',
        'approved_until' => 'date',
    ];

    /** Approved and not yet expired — safe to show publicly. */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'approved')
            ->where(fn ($q) => $q->whereNull('approved_until')->orWhereDate('approved_until', '>=', today()));
    }

    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }
}
