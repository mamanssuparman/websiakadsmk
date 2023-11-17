<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'judulvideoprofile',
        'urlvideo',
        'descriptionvideo',
        'judulsambutan',
        'isisambutan',
        'fotokepalasekolah',
        'noteleponsekolah',
        'emailsekolah',
        'alamatsekolah',
        'mapsekolah'
    ];
    protected $table = 'settings';
}
