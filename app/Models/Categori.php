<?php

namespace App\Models;

use sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categori extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoryname',
        'slug',
        'deskripsi',
        'isactivecategories'
    ];
    protected $table = 'categories';

    // Sluggable
    public function sluggable() : array
    {
        return [
            'slug'  => [
                'source'    => 'categoryname'
            ]
        ];
    }
}
