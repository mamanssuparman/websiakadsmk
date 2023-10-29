<?php

namespace App\Models;

use App\Models\User;
use App\Models\Mapel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapelajarguru extends Model
{
    use HasFactory;
    protected $fillable = [
        'guruid',
        'mapelid'
    ];
    protected $table = 'mapelajarguru';
    // Relasi Nilai balik to Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapelid', 'id');
    }
    // Relasi Nilai balik ke Users
    public function guru()
    {
        return $this->belongsTo(User::class, 'guruid', 'id');
    }
}
