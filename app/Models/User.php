<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\Banner;
use App\Models\Ekstra;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Galleryvideo;
use App\Models\Mapelajarguru;
use App\Models\Saranaprasarana;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nuptk',
        'nip',
        'nama',
        'alamat',
        'jeniskelamin',
        'pendidikanterakhir',
        'jabatan',
        'tugastambahan',
        'role',
        'photos',
        'statususers',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relation 1 : M to mapelajarguru
    public function mapelajargurus()
    {
        return $this->hasMany(Mapelajarguru::class, 'guruid', 'id');
    }

    // Relation 1 : M to ekstras
    public function ekstras()
    {
        return $this->hasMany(Ekstra::class, 'pembinaid', 'id');
    }

    // Relation 1 : M to Prodi
    public function prodis()
    {
        return $this->hasMany(Prodi::class, 'kajurid', 'id');
    }

    // Relasi 1:M to Galleryvideo
    public function galleryvideos()
    {
        return $this->hasMany(Galleryvideo::class, 'usersid', 'id');
    }

    // Relasi 1 : M to article
    public function articles()
    {
        return $this->hasMany(Article::class, 'usersid', 'id');
    }

    // Relasi 1 : M to Banners
    public function banners(){
        return $this->hasMany(Banner::class, 'usersid', 'id');
    }

    // Relasi 1 : M to Mitras
    public function mitras(){
        return $this->hasMany(Mitra::class, 'usersid', 'id');
    }

    // Relation 1 : M to Sarana
    public function saranas()
    {
        return $this->hasMany(Saranaprasarana::class, 'usersid', 'id');
    }
}
