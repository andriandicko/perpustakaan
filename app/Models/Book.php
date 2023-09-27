<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    // untuk menentukan kolom
    protected $fillable = [
        'book_code',
        'title',
        'cover',
        'slug',
    ];

    // untuk menambah slug
    public function sluggable(): array
    {
        return [
            'slug' => [
                // sumber slug di arahkan dari title table
                'source' => 'title'
            ]
        ];
    }

    // membuat relationship antara buku dengan kategori

    /**
     * The categories that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'book_category', 'book_id', 'category_id');
    }
}
