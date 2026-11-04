<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sandhi_listings', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // अर्जदार / कंपनी
            $table->string('mobile', 10);
            $table->string('email');
            $table->string('type');                 // प्रस्तावाचा प्रकार
            $table->string('district');
            $table->string('taluka');
            $table->string('location');
            $table->string('area');
            $table->string('map_url')->nullable();
            $table->text('brief');
            $table->text('terms')->nullable();
            $table->json('documents')->nullable();  // stored file paths (public disk)

            $table->unsignedInteger('fee')->nullable();              // ₹, set by admin
            $table->string('payment_status')->default('unpaid');     // unpaid | paid
            $table->string('payment_ref')->nullable();               // UTR / receipt no.

            $table->string('status')->default('submitted')->index(); // submitted | under_review | approved | rejected | paused
            $table->date('approved_until')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sandhi_listings');
    }
};
