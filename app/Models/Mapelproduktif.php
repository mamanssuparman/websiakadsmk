<?php

namespace App\Models;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapelproduktif extends Model
{
    use HasFactory;
    protected $fillable = [
        'prodiid',
        'deskripsi'
    ];
    protected $table = 'mapelproduktif';

    // Relasi nilai balik ke prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodiid', 'id');
    }
}
