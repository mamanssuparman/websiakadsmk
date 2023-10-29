<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapelproduktif extends Model
{
    use HasFactory;
    protected $fillable = [
        'prodiid',
        'deskripsi'
    ];
    protected $table = 'mapelproduktif';
}
