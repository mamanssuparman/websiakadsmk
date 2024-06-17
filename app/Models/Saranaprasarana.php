<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Saranaprasarana extends Model
{
    use HasFactory;
    protected $fillable = [
        'usersid',
        'judul',
        'pictures',
        'isactivesarana'
    ];
    protected $table = 'saranaprasarana';

    // ORM to Users
    public function User()
    {
        return $this->belongsTo(User::class, 'usersid', 'id');
    }
}
