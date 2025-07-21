<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $models = [
            'منتج',
            'تصنيف',
            'استفسار',
            'معلومات الشركة',
            'محتوى من نحن',
            'ميزة من نحن',
            'شريك',
            'سلايدر',
            'تواصل',
            'مواصفة المنتج',
            'مستخدم',
        ];
        $actions = [
            'إضافة', 'عرض', 'تعديل', 'حذف'
        ];

        // مشرف: كل الصلاحيات
        $admin = Role::firstOrCreate(['name' => 'مشرف']);
        $admin->syncPermissions(Permission::all());

        // مدير: عرض/تعديل لكل النماذج
        $manager = Role::firstOrCreate(['name' => 'مدير']);
        $managerPermissions = [];
        foreach ($models as $model) {
            foreach (['عرض', 'تعديل'] as $action) {
                $managerPermissions[] = $action . ' ' . $model;
            }
        }
        $manager->syncPermissions(Permission::whereIn('name', $managerPermissions)->get());

        // مشاهد: عرض فقط
        $viewer = Role::firstOrCreate(['name' => 'مشاهد']);
        $viewerPermissions = [];
        foreach ($models as $model) {
            $viewerPermissions[] = 'عرض ' . $model;
        }
        $viewer->syncPermissions(Permission::whereIn('name', $viewerPermissions)->get());
    }
} 