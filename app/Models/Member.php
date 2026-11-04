<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'jilha',
        'taluka',
        'city',
        'company_name',
        'state',
        'address',
        'village',
        'business_type',
        'website',
        'maharera_number',
        'business_details',
        'contact_consent',
        'status',
    ];

    public const STATUSES = [
        'pending'    => 'Pending',
        'verified'   => 'Verified',
        'unverified' => 'Unverified',
    ];

    protected $casts = [
        'contact_consent' => 'boolean',
    ];
}
