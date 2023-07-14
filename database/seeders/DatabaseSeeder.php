<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\RoleAndPermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(AdminUserSeeder::class);

        // for dev
        $users = User::factory(100)->create();
        $roleArr = array("Buyer", "Seller");

        foreach ($users as $user) {
            $rand_key = array_rand($roleArr);
            $user->assignRole($roleArr[$rand_key]);
        }

        Category::factory(20)->create();
        SubCategory::factory(12)->create();
        Product::factory(50)->create();
    }
}
