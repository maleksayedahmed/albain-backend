<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyInformation;

class CompanyInformationSeeder extends Seeder
{
    public function run(): void
    {
        CompanyInformation::truncate();
        CompanyInformation::create([
            'title' => 'الباين للتوريدات',
            'description' => 'نحن شركة متخصصة في توريد مواد البناء عالية الجودة، ونقدم حلولًا متكاملة لتلبية احتياجات المشاريع الإنشائية بمختلف أحجامها، من المشاريع السكنية الصغيرة إلى المشاريع التجارية والصناعية الكبرى.',
            'phone' => '+966550335535',
            'whatsapp' => '+966550335535',
            'email' => 'Info@albainco.com',
            'address' => 'الرياض، قرطبة، طريق الثمامة',
            'twitter' => '#',
            'linkedin' => '#',
            'instagram' => '#',
            'facebook' => '#',
            'snapchat' => '#',
            'map_url' => 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3620.8697396624375!2d46.73668038499778!3d24.83412788406644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjTCsDUwJzAyLjkiTiA0NsKwNDQnMDQuMiJF!5e0!3m2!1sar!2seg!4v1752443489664!5m2!1sar!2seg',
        ]);
    }
} 