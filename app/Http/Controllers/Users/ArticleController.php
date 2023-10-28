<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'     => 'SMK Negeri 3 Banjar | Profile'
        ];
        return view('frontend.pages.article.articleall', compact('data'));
    }
    public function detail(Request $request)
    {
        $data = [
            'title'     => 'SMK Negeri 3 Banjar | Profile'
        ];
        return view('frontend.pages.article.detail', compact('data'));
    }
}
