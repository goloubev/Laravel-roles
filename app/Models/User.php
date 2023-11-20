<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static create(array $array)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles;
    //use Notifiable;

    // Force SQL table name
    protected $table = 'users';

    // Unlock for modification all SQL table fields
    protected $guarded = false;

    // The attributes that should be hidden for serialization
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // The attributes that should be cast
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
