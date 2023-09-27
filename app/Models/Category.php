<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    // garis merah tidak apa2 itu karena vscodenya
    use Sluggable;
    use SoftDeletes;

    // fungsinya untuk menambahkan data ke database pada form
    protected $fillable = [
        'name',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                // sumber slug di arahkan dari name
                'source' => 'name'
            ]
        ];
    }
}
