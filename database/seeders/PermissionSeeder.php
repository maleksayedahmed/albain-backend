<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $models = [
            'Product' => 'منتج',
            'Category' => 'تصنيف',
            'Inquiry' => 'استفسار',
            'CompanyInformation' => 'معلومات الشركة',
            'AboutUsContent' => 'محتوى من نحن',
            'AboutUsFeature' => 'ميزة من نحن',
            'Partner' => 'شريك',
            'Slider' => 'سلايدر',
            'Contact' => 'تواصل',
            'ProductSpecification' => 'مواصفة المنتج',
            'User' => 'مستخدم',
        ];
        $actions = [
            'create' => 'إضافة',
            'read' => 'عرض',
            'update' => 'تعديل',
            'delete' => 'حذف',
        ];
        foreach ($models as $modelKey => $modelAr) {
            foreach ($actions as $actionKey => $actionAr) {
                Permission::firstOrCreate([
                    'name' => $actionAr . ' ' . $modelAr,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
} 