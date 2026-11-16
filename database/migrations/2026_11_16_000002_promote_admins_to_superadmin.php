<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Roles are now: superadmin (full ERP + staff management) | admin (ERP staff) | user.
     * Everyone who was 'admin' before had full access, so they become superadmin.
     */
    public function up(): void
    {
        DB::table('users')->where('role', 'admin')->update(['role' => 'superadmin']);
    }

    public function down(): void
    {
        DB::table('users')->where('role', 'superadmin')->update(['role' => 'admin']);
    }
};
