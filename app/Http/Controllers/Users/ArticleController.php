<?php

namespace App\Http\Controllers\Users;

use App\Models\Article;
use App\Models\Categori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $article = Article::with(['user','categori']);
        if(request('search')){
            $article->where('judul','like','%'. request('search').'%');
        }
        if(request('category')){
            $idCategory= Categori::where('slug', request('category'))->firstOrFail();
            $article->where('categoriesid',$idCategory->id);
        }
        $data = [
            'title'             => 'SMK Negeri 3 Banjar | Profile',
            'dataArticle'    => $article->paginate(10),
            'listCategori'      => Categori::where('isactivecategories', 'Active')->get()
        ];
        return view('frontend.pages.article.articleall', $data);
    }
    public function detail(Request $request, $id)
    {
        $data = [
            'title'             => 'Home | SMK Negeri 3 Banjar',
            'navigation'        => "Home",
            'detailArticle'     => Article::with(['categori','user'])->where('slug',$id)->firstOrFail(),
            'listCategori'      => Categori::where('isactivecategories','Active')->get()
        ];
        return view('frontend.pages.article.detail', $data);
    }
}
