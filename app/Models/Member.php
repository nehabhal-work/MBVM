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
    ];
}