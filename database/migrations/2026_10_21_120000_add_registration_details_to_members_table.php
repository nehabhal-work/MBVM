<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('state')->nullable();
            $table->text('address')->nullable();
            $table->string('village')->nullable();
            $table->string('business_type')->nullable();
            $table->string('website')->nullable();
            $table->string('maharera_number')->nullable();
            $table->text('business_details')->nullable();
            $table->boolean('contact_consent')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'state',
                'address',
                'village',
                'business_type',
                'website',
                'maharera_number',
                'business_details',
                'contact_consent',
            ]);
        });
    }
};
