<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Messages sent from the public "संपर्क" (contact) form
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile', 15);
            $table->string('email')->nullable();
            $table->string('organization')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->string('status')->default('new')->index(); // new | in_progress | closed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
