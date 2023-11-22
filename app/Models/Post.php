<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $all)
 * @method static orderBy(string $string, string $string1)
 * @method static where(string $string, string $string1)
 */
class Post extends Model
{
    use HasFactory;

    //protected $guarded = false;

    protected $fillable = [
        'title',
        'text',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        // ONE to ONE
        // From POSTS (category_id) to CATEGORIES (id)
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
