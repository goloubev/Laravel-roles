<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'show-post']);
        Permission::create(['name' => 'add-post']);
        Permission::create(['name' => 'edit-post']);
        Permission::create(['name' => 'delete-post']);
    }
}
