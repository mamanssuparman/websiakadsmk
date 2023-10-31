<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categori extends Model
{
    use HasFactory;
    use sluggable;
    protected $fillable = [
        'categoryname',
        'slug',
        'deskripsi',
        'isactivecategories'
    ];
    protected $table = 'categories';

    // Relasi 1:M to article
    public function articles()
    {
        return $this->hasMany(Article::class, 'categoriesid', 'id');
    }
    // Sluggable
    public function sluggable() : array
    {
        return [
            'slug'  => [
                'source'    => 'categoryname'
            ]
        ];
    }
}
