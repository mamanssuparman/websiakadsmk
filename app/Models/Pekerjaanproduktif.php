<?php

namespace App\Models;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pekerjaanproduktif extends Model
{
    use HasFactory;
    protected $fillable = [
        'prodiid',
        'deskripsi'
    ];
    protected $table = 'pekerjaanproduktif';

    // Relasi nilai balik ke Prodi
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodiid', 'id');
    }
}
