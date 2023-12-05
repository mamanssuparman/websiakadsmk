<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;
    protected $fillable= [
        'usersid',
        'namamitra',
        'picture',
        'statusmitra'
    ];
    protected $table = 'mitra';

    // ORM Relasi Nilai balik ke table users
    public function user()
    {
        return $this->belongsTo(User::class, 'usersid', 'id');
    }
}
