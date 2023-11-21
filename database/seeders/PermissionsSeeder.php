<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'Show posts']);
        Permission::create(['name' => 'Add posts']);
        Permission::create(['name' => 'Edit posts']);
        Permission::create(['name' => 'Delete posts']);
    }
}
