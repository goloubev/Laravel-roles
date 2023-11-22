<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $data)
 * @method static where(string $string, $category_id)
 * @method static inRandomOrder()
 * @method static orderBy(string $string, string $string1)
 */
class Category extends Model
{
    use HasFactory;

    // Force SQL table name
    protected $table = 'categories';

    // Unlock for modification all SQL table fields
    protected $guarded = false;
}
