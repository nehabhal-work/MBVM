<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('image');                         // public path (img/...) or storage path (banners/...)
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        // Seed the banners that were previously hardcoded on the home page
        $now = now();
        DB::table('banners')->insert([
            ['heading' => 'महाराष्ट्रातील मराठी बांधकाम व्यावसायिकांची राज्यस्तरीय शिखर संघटना', 'image' => 'img/MBVM_Hero_First_4.webp', 'sort_order' => 1, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['heading' => 'महाराष्ट्रातील मराठी विकासकांना एकत्र आणणारे व्यासपीठ', 'image' => 'img/MBVM_Hero_Second.webp', 'sort_order' => 2, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['heading' => 'एकत्रित बळ, एकत्रित आवाज', 'image' => 'img/MBVM_Hero_Third.webp', 'sort_order' => 3, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
