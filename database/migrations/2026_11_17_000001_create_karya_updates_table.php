<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // "आमचे कार्य" updates — full list on /karya, selected ones on the home page
        Schema::create('karya_updates', function (Blueprint $table) {
            $table->id();
            $table->date('event_date');
            $table->string('category');
            $table->string('title');
            $table->text('excerpt')->nullable();
            $table->string('authority')->nullable();   // प्राधिकरण — filled = shown in the निवेदने table
            $table->string('outcome')->nullable();     // स्थिती, e.g. सादर / बैठक झाली
            $table->boolean('is_active')->default(true)->index();
            $table->boolean('show_on_home')->default(false)->index();
            $table->unsignedInteger('home_order')->default(0);
            $table->timestamps();
        });

        // Seed the updates that were previously hardcoded in routes/web.php
        $now = now();
        $rows = [
            ['2026-09-28', 'शासनाकडे निवेदने', 'UDCPR मधील TDR वापर मर्यादेबाबत नगरविकास विभागाकडे निवेदन', 'राज्यातील विकासकांच्या अडचणी मांडणारे सविस्तर निवेदन; बैठक ऑक्टोबरमध्ये अपेक्षित.', 'नगरविकास विभाग, मंत्रालय', 'सादर'],
            ['2026-09-15', 'प्राधिकरणांशी बैठका', 'MahaRERA सोबत प्रकल्प नोंदणी प्रक्रियेवर चर्चा', 'नोंदणी अर्जातील त्रुटी-सूचना वेळेत मिळाव्यात यासाठी महासंघाची मागणी.', 'MahaRERA, मुंबई', 'बैठक झाली'],
            ['2026-06-22', 'कार्यक्रम', 'पुणे येथे आशियाना बैठक — जिल्हा संघटना बळकटीकरण', 'पुणे जिल्हा संघटनेच्या कार्यकारिणीसोबत महासंघ पदाधिकाऱ्यांची बैठक.', null, null],
            ['2026-06-05', 'नियामक बाबी', 'पर्यावरण परवानगी प्रक्रियेतील विलंबाबाबत निवेदन', 'मोठ्या प्रकल्पांसाठी पर्यावरण परवानगी प्रक्रियेतील विलंब कमी करण्याची मागणी.', 'पर्यावरण विभाग', 'सादर'],
            ['2026-05-18', 'स्थानिक संघटना उपक्रम', 'नागपूर संघटनेच्या उपक्रमांचा आढावा', 'स्थानिक विकासकांच्या प्रश्नांवर चर्चा करून पुढील कामाचे नियोजन.', null, null],
        ];

        foreach ($rows as $i => [$date, $category, $title, $excerpt, $authority, $outcome]) {
            DB::table('karya_updates')->insert([
                'event_date' => $date, 'category' => $category, 'title' => $title, 'excerpt' => $excerpt,
                'authority' => $authority, 'outcome' => $outcome, 'is_active' => true,
                'show_on_home' => $i < 3, 'home_order' => $i < 3 ? $i + 1 : 0,
                'created_at' => $now, 'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('karya_updates');
    }
};
