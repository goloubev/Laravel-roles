<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/*
php artisan migrate:fresh --seed
*/
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // php artisan make:seeder ProductsTableSeeder
        // php artisan make:factory ProductFactory

        $this->call(CategoriesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PostsSeeder::class);
    }
}
