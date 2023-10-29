<?php

namespace App\Models;

use sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ekstra extends Model
{
    use HasFactory;
    protected $fillable = [
        'pembinaid',
        'sinomim',
        'judul',
        'slug',
        'headerpicture',
        'description',
        'isactiveekstra'
    ];
    protected $table = 'ekstras';
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
