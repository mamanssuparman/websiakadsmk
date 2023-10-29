<?php

namespace App\Models;

use App\Models\User;
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

    // Relasi nilai balik ke users
    public function user()
    {
        return $this->belongsTo(User::class, 'usersid', 'id');
    }


}
