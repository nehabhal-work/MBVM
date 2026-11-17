<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    public const STATUSES = [
        'new'         => 'नवीन',
        'in_progress' => 'प्रक्रियेत',
        'closed'      => 'पूर्ण',
    ];

    protected $fillable = ['name', 'mobile', 'email', 'organization', 'subject', 'message', 'status'];
}
