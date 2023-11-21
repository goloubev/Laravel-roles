<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        /** @var User $user */
        $user = User::create([
            'name'  => 'Vadim Goloubev',
            'email' => 'goloubev@hotmail.com',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('super-admin');

        /** @var User $user */
        $user = User::create([
            'name'  => 'Test',
            'email' => 'test@test.com',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('user');

        $role = Role::findByName('user');
        $permission = Permission::findByName('show-posts');
        $role->syncPermissions($permission);
    }
}
