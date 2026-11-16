<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->default('fa-file-alt');   // Font Awesome icon class
            $table->string('file')->nullable();               // storage path (documents/...) — null = not yet available
            $table->string('pending_label')->default('मंजुरीनंतर उपलब्ध'); // shown while no file is uploaded
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });

        // Seed the documents that were previously hardcoded on the दस्तऐवज page
        $now = now();
        $rows = [
            ['मसुदा MoU', 'स्थानिक संघटना आणि महासंघ यांच्यातील संलग्नता, समन्वय आणि जबाबदाऱ्या स्पष्ट करणारा मसुदा.', 'fa-handshake', 'मंजुरीनंतर उपलब्ध'],
            ['मानक घटना', 'स्थानिक संघटनेची रचना, पदाधिकारी, सदस्यत्व आणि कार्यपद्धती यांसाठीचा मानक नमुना.', 'fa-book-open', 'मंजुरीनंतर उपलब्ध'],
            ['संघटना स्थापना मार्गदर्शिका', 'स्थानिक संघटनेची स्थापना आणि नोंदणी प्रक्रियेबाबत आवश्यक टप्पे व मार्गदर्शन.', 'fa-building', 'तयारीत'],
            ['अर्ज नमुने', 'संलग्नता आणि संघटना स्थापनेसाठी आवश्यक अर्ज व नमुना कागदपत्रे.', 'fa-file-signature', 'तयारीत'],
        ];

        foreach ($rows as $i => [$title, $description, $icon, $pending]) {
            DB::table('documents')->insert([
                'title' => $title, 'description' => $description, 'icon' => $icon, 'pending_label' => $pending,
                'sort_order' => $i + 1, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
