<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('partners')->delete();

        $partners = [
            [
                'name' => 'وزارة الرياضة',
                'image' => 'saudi-sports-ministry-logo.png',
            ],
            [
                'name' => 'SDAIA',
                'image' => 'sdaia-logo.png',
            ],
            [
                'name' => 'مصرف الراجحي',
                'image' => 'alrajhi-bank-logo.png',
            ],
            [
                'name' => 'وزارة الطاقة',
                'image' => 'saudi-energy-ministry-logo.png',
            ],
            [
                'name' => 'منشآت',
                'image' => 'monshaat-logo.png',
            ],
            [
                'name' => 'وزارة الإعلام',
                'image' => 'saudi-media-ministry-logo.png',
            ],
            [
                'name' => 'DGA',
                'image' => 'dga-logo.png',
            ],
            [
                'name' => 'اعتماد',
                'image' => 'etimad-logo.png',
            ],
            [
                'name' => 'GAOMR',
                'image' => 'gaomr-logo.png',
            ],
            [
                'name' => 'GOV.SA',
                'image' => 'gov-sa-logo.png',
            ],
            [
                'name' => 'سبق',
                'image' => 'sabq-logo.png',
            ],
            [
                'name' => 'ثقة',
                'image' => 'thiqah-logo.png',
            ],
            [
                'name' => 'وزارة التعليم',
                'image' => 'moe-logo.png',
            ],
        ];

        foreach ($partners as $data) {
            $partner = Partner::create([
                'name' => $data['name'],
            ]);

            $imagePath = public_path('assets/images/' . $data['image']);
            if (file_exists($imagePath)) {
                $partner->addMedia($imagePath)->preservingOriginal()->toMediaCollection('image');
            }
        }
    }
} 