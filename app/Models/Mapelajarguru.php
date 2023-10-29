<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapelajarguru extends Model
{
    use HasFactory;
    protected $fillable = [
        'guruid',
        'mapelid'
    ];
    protected $table = 'mapelajarguru';
}
