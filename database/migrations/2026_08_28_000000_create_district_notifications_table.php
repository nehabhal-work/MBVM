<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('district_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('jilha')->unique();
            $table->unsignedInteger('member_count_at_trigger');
            $table->timestamp('notified_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('district_notifications');
    }
};
