<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperUserSeeder extends Seeder
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

        $user->assignRole('super-user');
    }
}
