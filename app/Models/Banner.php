<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'pictures',
        'urls',
        'usersid',
        'statusbanner'
    ];
    protected $table = 'banners';

    // Relasi Nilai balik ke Users
    public function user()
    {
        return $this->belongsTo(User::class, 'usersid', 'id');
    }
}
