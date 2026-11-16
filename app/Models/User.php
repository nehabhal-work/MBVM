<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'otp',
        'otp_expires_at',
        'email_verified_at',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'otp',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_expires_at' => 'datetime',
        'password' => 'hashed',
    ];

    /** superadmin: full ERP + staff management · admin: ERP staff · user: website member */
    public const ROLES = [
        'superadmin' => 'सुपर अ‍ॅडमिन',
        'admin'      => 'अ‍ॅडमिन (स्टाफ)',
        'user'       => 'सदस्य',
    ];

    public function isSuperAdmin(): bool
    {
        return $this->role === 'superadmin';
    }

    /** Can open the ERP / admin panel. */
    public function isAdmin(): bool
    {
        return in_array($this->role, ['admin', 'superadmin'], true);
    }

    public function homeRoute(): string
    {
        return $this->isAdmin() ? route('admin.users.index', ['tab' => 'dashboard']) : route('home');
    }
}
