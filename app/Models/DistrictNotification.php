<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DistrictNotification extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'jilha',
        'member_count_at_trigger',
        'notified_at',
    ];

    protected $casts = [
        'notified_at' => 'datetime',
    ];
}
