<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    public function run(): void
    {
        /** @var User $superUser */
        $superUser = User::create([
            'name'  => 'Vadim Goloubev',
            'email' => 'goloubev@hotmail.com',
            'password' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Role::create([
            'name' => 'super-user',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $superUser->assignRole('super-user');
    }
}
