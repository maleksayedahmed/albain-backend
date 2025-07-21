<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        

        // User::factory(10)->create();

        // $this->call(UserSeeder::class);
        $this->call(CompanyInformationSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(AboutUsFeatureSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@123'),
        ]);
        $admin->assignRole('مشرف');
    }
}
