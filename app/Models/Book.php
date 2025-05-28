<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author_name',
        'prince',
        'description',
        'quantity',
        'book_img',
        'author_img',
        'category_id',
    ];
    public function category() : BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
