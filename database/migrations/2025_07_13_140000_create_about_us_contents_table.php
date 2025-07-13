<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_us_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section_title');
            $table->text('paragraph_1');
            $table->text('paragraph_2')->nullable();
            $table->text('paragraph_3')->nullable();
            $table->json('list_items')->nullable();
            $table->timestamps();
        });

        // Insert initial Arabic content
        DB::table('about_us_contents')->insert([
            'section_title' => 'من نحن؟',
            'paragraph_1' => 'نحن شركة متخصصة في توريد مواد البناء عالية الجودة، ونقدم حلولًا متكاملة لتلبية احتياجات المشاريع الإنشائية بمختلف أحجامها، من المشاريع السكنية الصغيرة إلى المشاريع التجارية والصناعية الكبرى.',
            'paragraph_2' => 'نلتزم بتوفير مواد بناء موثوقة، يتم اختيارها بعناية من مصادر معتمدة، لضمان أعلى معايير الجودة والمتانة. كما نحرص على تقديم تجربة عملاء متميزة تشمل:',
            'paragraph_3' => 'في شركتنا، نؤمن بأن النجاح في قطاع البناء يعتمد على الشراكة والثقة. لذلك، نسعى لأن نكون الشريك الموثوق لجميع مشاريعكم الإنشائية، مقدمين لكم كل ما تحتاجونه من حديد، خشب، ومواد بناء أساسية بخدمة لا تضاهى وجودة تستحق الثقة.',
            'list_items' => json_encode([
                'الاستشارات الفنية: لمساعدة عملائنا في اختيار المواد الأنسب لمتطلبات مشاريعهم.',
                'التوريد الفعّال: لضمان تسليم المواد في الوقت المحدد وفي الموقع المطلوب.',
                'أسعار تنافسية: لتحقيق أفضل قيمة وجودة مقابل السعر.',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_contents');
    }
}; 