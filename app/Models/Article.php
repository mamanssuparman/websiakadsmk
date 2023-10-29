<?php

namespace App\Models;

use sluggable;
use App\Models\User;
use App\Models\Comment;
use App\Models\Visitor;
use App\Models\Categori;
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

    // Relasi nilai balik ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'usersid', 'id');
    }

    // Relasi nilai Balik ke Categori
    public function categori()
    {
        return $this->belongsTo(Categori::class, 'categoriesid', 'id');
    }

    // Relasi 1 : M to comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'articleid', 'id');
    }

    // Relasi 1 : M to Visitors
    public function visitors()
    {
        return $this->hasMany(Visitor::class, 'articleid', 'id');
    }
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
