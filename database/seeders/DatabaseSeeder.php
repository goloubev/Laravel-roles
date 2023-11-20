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

        $this->call(CreateSuperUserSeeder::class);
    }
}
