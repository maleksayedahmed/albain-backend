<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sliders')->delete();

        $sliders = [
            [
                'title' => 'كل ما تحتاجه من التوريدات نوفره لك بجودة عالية وسرعة تسليم.',
                'description' => 'توريدات لكافة مستلزمات البناء من الأساس وحتى التشطيبات',
                'image' => 'sl1.jpg',
            ],
            [
                'title' => 'حلول متكاملة لمشاريع البناء والتشييد.',
                'description' => 'نوفر مواد بناء موثوقة تلبي كافة المعايير.',
                'image' => 'sl2.jpg',
            ],
            [
                'title' => 'استشارات فنية',
                'description' => 'فريقنا متخصص يساعدك في اختيار المواد المناسبه',
                'image' => 'sl3.jpg',
            ],
            [
                'title' => 'اسعار تنافسية',
                'description' => 'أفضل العروض والأسعار في السوق لمواد بناء موثوقة',
                'image' => 'sl4.jpg',
            ],
        ];

        foreach ($sliders as $data) {
            $slider = Slider::create([
                'title' => $data['title'],
                'description' => $data['description'],
            ]);

            $imagePath = public_path('assets/images/' . $data['image']);
            if (file_exists($imagePath)) {
                $slider->addMedia($imagePath)->preservingOriginal()->toMediaCollection('image');
            }
        }
    }
} 