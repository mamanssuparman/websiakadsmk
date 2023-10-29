<?php

namespace App\Models;

use sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'slug',
        'headerpicture',
        'categoriesid',
        'article',
        'usersid',
        'isactivearticle'
    ];
    protected $table = 'articles';

    // Sluggable
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
