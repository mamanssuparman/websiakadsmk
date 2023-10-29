<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [
        'articleid',
        'ipaddress',
        'client'
    ];
    protected $table = 'visitors';
    // Relasi nilai balik ke visitor
    public function article()
    {
        return $this->belongsTo(Article::class, 'articleid', 'id');
    }
}
