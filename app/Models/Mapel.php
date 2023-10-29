<?php

namespace App\Models;

use App\Models\Mapelajarguru;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = [
        'namamapel',
        'description',
        'isactivemapel'
    ];
    protected $table = 'mapel';

    // Model Relation to mapelajarguru
    public function mapelajargurus()
    {
        return $this->hasMany(Mapelajarguru::class,'mapelid', id);
    }
}
