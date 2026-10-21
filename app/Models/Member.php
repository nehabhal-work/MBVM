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
    ];

    protected $casts = [
        'contact_consent' => 'boolean',
    ];
}
