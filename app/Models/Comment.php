<?php

namespace App\Models;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'articleid',
        'comment',
        'isactivecomments',
        'status',
        'usersid'
    ];
    protected $table = 'comments';

    // Relasi nilai balik ke Article
    public function article()
    {
        return $this->belongsTo(Article::class, 'articleid', 'id');
    }

    // Relasi untuk mengambil id user
    public function user_nama()
    {
        return $this->belongsTo(User::class, 'usersid', 'id');
    }
}
