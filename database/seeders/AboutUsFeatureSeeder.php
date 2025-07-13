<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutUsFeature;
use Illuminate\Support\Facades\Storage;

class AboutUsFeatureSeeder extends Seeder
{
    public function run()
    {
        $features = [
            [
                'title' => 'الاستشارات الفنية',
                'description' => 'فريق متخصص يساعدك في اختيار المواد المناسبة ويوجهك لحلول أفضل تناسب مشروعك.',
                'icon' => 'technical-support-icon.svg',
                'bg_color' => '#CC912A',
            ],
            [
                'title' => 'مواد بناء موثوقة',
                'description' => 'منتجاتنا معتمدة وذات جودة عالية تلبي متطلبات المشاريع الإنشائية باحترافية.',
                'icon' => 'building-materials-icon.svg',
                'bg_color' => '#306A8E',
            ],
            [
                'title' => 'أسعار تنافسية',
                'description' => 'نوفر لك أفضل العروض والأسعار في السوق بدون التأثير على جودة المواد أو الخدمة.',
                'icon' => 'money-bag-icon.svg',
                'bg_color' => '#5A8C63',
            ],
            [
                'title' => 'التوريد الفعال',
                'description' => 'نوصّل طلباتك بسرعة وبدقة، مع نظام متابعة يضمن وصول المواد في الوقت المحدد دون تأخير.',
                'icon' => 'truck-icon.svg',
                'bg_color' => '#446FAE',
            ],
        ];

        foreach ($features as $feature) {
            $aboutUsFeature = AboutUsFeature::create([
                'title' => $feature['title'],
                'description' => $feature['description'],
                'bg_color' => $feature['bg_color'],
            ]);
            // Attach icon using Spatie Media Library
            $iconPath = public_path('assets/images/' . $feature['icon']);
            if (file_exists($iconPath)) {
                $aboutUsFeature->addMedia($iconPath)->preservingOriginal()->toMediaCollection('icon');
            }
        }
    }
} 