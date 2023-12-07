<?php

namespace App\Http\Controllers\Users;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Categori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $article = Article::with(['user','categori'])->where('isactivearticle', 'Active');
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
        // GetIdArticle
        $idArticle = Article::where('slug', $id)->firstOrFail();
        $data = [
            'title'             => 'Home | SMK Negeri 3 Banjar',
            'navigation'        => "Home",
            'detailArticle'     => Article::with(['categori','user'])->where('slug',$id)->firstOrFail(),
            'listCategori'      => Categori::where('isactivecategories','Active')->get(),
            'getComment'        => Comment::where('articleid',$idArticle->id)->where('statuscomment', 'Approve')->get()
        ];
        return view('frontend.pages.article.detail', $data);
    }

    public function storecomment(Request $request, $id)
    {
        $idArticle = Article::where('slug', $id)->firstOrFail();
        try {
            $request->validate([
                'namacomentar'      => 'required',
                'email'             => 'required',
                'isicomentar'       => 'required'
            ]);
            $dataStore = [
                'articleid'         => $idArticle->id,
                'namacomentar'      => $request->namacomentar,
                'email'             => $request->email,
                'comment'           => $request->isicomentar,
            ];
            Comment::create($dataStore);
            return response()->json([
                'message'           => 'Terima kasih telah memberikan Komentar, Komentar akan di tinjau dahulu sebelum di tampilkan.!'
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message'           => $request->session()->flash('success', 'Gagal mengirim komentar')
            ], 500);
        }
    }
}
