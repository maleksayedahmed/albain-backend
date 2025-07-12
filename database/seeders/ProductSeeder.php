<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_specifications')->delete();
        DB::table('products')->delete();

        $products = [
            [
                'name' => 'حديد الجزيرة',
                'description' => 'حديد عالي الجودة يستخدم في أعمال البناء والإنشاءات، يتميز بالقوة والصلابة ومقاومة العوامل البيئية.',
                'price' => 3000,
                'unit' => 'للطن',
                'image' => 'product-1.png',
            ],
            [
                'name' => 'خشب بلايوود مدهون صيني',
                'description' => 'خشب بلايوود صيني مقاوم للرطوبة، مناسب لأعمال القوالب والنجارة، مطلي بمواد عازلة.',
                'price' => 8000,
                'unit' => 'للطن',
                'image' => 'product-2.png',
            ],
            [
                'name' => 'الخشب الرقائقي العادي',
                'description' => 'خشب رقائقي متعدد الطبقات، يستخدم في الأثاث والتجهيزات الداخلية والخارجية.',
                'price' => 2000,
                'unit' => 'للطن',
                'image' => 'product-3.png',
            ],
            [
                'name' => 'خشب MDF إم أند إم',
                'description' => 'لوح MDF متوسط الكثافة، ناعم ومثالي لأعمال الديكور والتصميم الداخلي.',
                'price' => 4000,
                'unit' => 'للطن',
                'image' => 'product-4.png',
            ],
            [
                'name' => 'خشب بلايوود مدهون صيني (نوع 2)',
                'description' => 'نسخة ثانية من خشب البلايوود الصيني المقاوم، بجودة محسنة ومتانة عالية.',
                'price' => 8000,
                'unit' => 'للطن',
                'image' => 'product-5.png',
            ],
            [
                'name' => 'قفازات الأمان',
                'description' => 'قفازات أمان مصنوعة من مادة اللاتكس، مصممة لحماية اليدين من المواد الكيميائية والجروح.',
                'price' => 200,
                'unit' => 'للكرتون',
                'image' => 'product-6.png',
            ],
        ];

        foreach ($products as $data) {
            $product = Product::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'unit' => $data['unit'],
            ]);

            $imagePath = public_path('assets/images/' . $data['image']);
            if (!file_exists($imagePath)) {
                $imagePath = public_path('assets/images/product-2.png');
            }

            $media = $product->addMedia($imagePath)->toMediaCollection('gallery');
            $media->copy($product, 'thumbnail');

            $specs = match ($product->name) {
                'حديد الجزيرة' => [
                    ['specification_key' => 'السمك', 'specification_value' => '10 مم'],
                    ['specification_key' => 'الأبعاد', 'specification_value' => '120×240 سم'],
                    ['specification_key' => 'المادة', 'specification_value' => 'حديد'],
                ],
                'خشب بلايوود مدهون صيني',
                'خشب بلايوود مدهون صيني (نوع 2)' => [
                    ['specification_key' => 'السمك', 'specification_value' => '18 مم'],
                    ['specification_key' => 'الأبعاد', 'specification_value' => '122×244 سم'],
                    ['specification_key' => 'المادة', 'specification_value' => 'بلايوود صيني'],
                ],
                'الخشب الرقائقي العادي' => [
                    ['specification_key' => 'السمك', 'specification_value' => '12 مم'],
                    ['specification_key' => 'الأبعاد', 'specification_value' => '120×240 سم'],
                    ['specification_key' => 'المادة', 'specification_value' => 'خشب رقائقي'],
                ],
                'خشب MDF إم أند إم' => [
                    ['specification_key' => 'السمك', 'specification_value' => '15 مم'],
                    ['specification_key' => 'الأبعاد', 'specification_value' => '120×240 سم'],
                    ['specification_key' => 'المادة', 'specification_value' => 'MDF'],
                ],
                'قفازات الأمان' => [
                    ['specification_key' => 'المقاس', 'specification_value' => 'XL'],
                    ['specification_key' => 'اللون', 'specification_value' => 'أزرق'],
                    ['specification_key' => 'المادة', 'specification_value' => 'لاتكس'],
                ],
                default => [
                    ['specification_key' => 'السمك', 'specification_value' => 'غير محدد'],
                    ['specification_key' => 'الأبعاد', 'specification_value' => 'غير محدد'],
                ],
            };

            foreach ($specs as $spec) {
                $product->specifications()->create($spec);
            }
        }
    }
}
