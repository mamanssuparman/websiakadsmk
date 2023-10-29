<?php

namespace App\Models;

use sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galleryvideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'usersid',
        'judul',
        'picture',
        'urlvideo',
        'jenis',
        'isactivegallery'
    ];
    protected $table = 'galleryvideos';
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
