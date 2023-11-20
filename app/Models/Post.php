<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 * @method static orderBy(string $string, string $string1)
 */
class Post extends Model
{
    use HasFactory;

    //protected $guarded = false;

    protected $fillable = [
        'name',
        'text',
    ];
}
