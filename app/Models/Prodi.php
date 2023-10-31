<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;
use App\Models\Prestasiprodi;
use App\Models\Mapelproduktif;
use App\Models\Pekerjaanproduktif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;
    use sluggable;
    protected $fillable = [
        'kajurid',
        'sinomin',
        'judul',
        'slug',
        'logoprodi',
        'description',
        'isactiveprodi'
    ];
    protected $table = 'prodis';

    // Relasi Nilai balik ke users
    public function kajur()
    {
        return $this->belongsTo(User::class, 'kajurid', 'id');
    }

    // Relasi ke Prestasi prodi
    public function prestasiprodis()
    {
        return $this->hasMany(Prestasiprodi::class, 'prodiid', 'id');
    }

    // Relasi 1 : M to Mapel Produktif
    public function mapelproduktifs()
    {
        return $this->hasMany(Mapelproduktif::class, 'prodiid', 'id');
    }

    // Relasi 1 : M to Pekerjaan produktif
    public function pekerjaanproduktifs()
    {
        return $this->hasMany(Pekerjaanproduktif::class, 'prodiid', 'id');
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
