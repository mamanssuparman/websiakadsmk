<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ekstra extends Model
{
    use HasFactory;
    use sluggable;
    protected $fillable = [
        'pembinaid',
        'sinonim',
        'judul',
        'slug',
        'headerpicture',
        'description',
        'isactiveekstra'
    ];
    protected $table = 'ekstras';
    // Relasi nilai balik ke tabel Users
    public function pembina()
    {
        return $this->belongsTo(User::class, 'pembinaid', 'id');
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
