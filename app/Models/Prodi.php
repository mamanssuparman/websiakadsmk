<?php

namespace App\Models;

use sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;
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
