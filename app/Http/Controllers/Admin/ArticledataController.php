<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Article;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ArticledataController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Article',
            'head'          => 'Article',
            'breadcumb1'    => 'Article',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.article.index', $data);
    }
    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Article',
            'head'          => 'Article',
            'breadcumb1'    => 'Article',
            'breadcumb2'    => 'Add',
            'datacategories'=> Categori::where('isactivecategories', 'Active')->get()
        ];
        return view('adminpanel.pages.article.add', $data);
    }
    public function edit(Request $request, $id)
    {
        $data = [
            'title'         => 'S-Panel | Article',
            'head'          => 'Article',
            'breadcumb1'    => 'Article',
            'breadcumb2'    => 'Edit',
            'dataarticle'   => Article::where('id',base64_decode($id))->firstOrFail(),
            'datacategory'  => Categori::where('isactivecategories', 'Active')->get()
        ];
        return view('adminpanel.pages.article.edit', $data);
    }
    public function getDataArticle(Request $request)
    {
        $csrf_hash = $request->input('_token');
        $orderBy = 'articles.judul';
        switch ($request->input('order.3.column')) {
            case '1': //untuk inisialisasi data kolom
                $orderBy = 'articles.judul';
                break;
        }
        $orderSort = $request->input('order.0.dir');
        // Get Data Nya
        $data = DB::table('articles')->join('categories','articles.categoriesid','=','categories.id')->select('articles.*','categories.categoryname');
        // Function filter dari inputan search
        if($request->input('search.value')!= null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(judul) like ?',['%'.$request->input('search.value').'%']);
            });
        }
        $recordsFiltered = $data->get()->count(); //menampilkan jumlah Isi Record yang terfilter
        if($request->input('length')!= -1)$data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy,  'asc')->get();
        $recordsTotal = $data->count(); //menampilkan jumlah seluruh data
        $data1 = array();
        $no = $request->input('start');
        foreach ($data as $x) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $x->judul;
            $row[] = $x->categoryname;
            $row[] = '100 x views';
            $row[] = $this->_toggle($x);
            $row[] = $this->_btn_detail($x).' '.$this->_views_detail($x).' '.$this->_copy_button($x);
            $data1 [] = $row;
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data1,
        ]);
    }
    private function _copy_button($x)
    {
        $slug = $x->slug;
        $copy_button = '<buton class="px-1 text-white bg-yellow-600 rounded-sm" onclick="copyUrl(this, '."'$x->slug'".')"><i class="bi bi-copy"></i></buton>';
        return $copy_button;
    }
    private function _views_detail($x)
    {
        $views_detail = '<a class="px-1 text-white bg-green-500 rounded-sm" href="'.url('admin').'/article/views/'.base64_encode($x->id).'"><i class="bi bi-eye-fill"></i></a>';
        return $views_detail;
    }
    private function _toggle($x)
    {
        $active = 'Active';
        $non    ="Non-Active";
        $statustoogle = $x->isactivearticle;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="activenon(this,'.$x->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="activenon(this,'.$x->id.')">';
        }
        return $togle;
    }
    private function _btn_detail($x)
    {
        $btn_detail = '<a href="'.url('admin/article/edit/'.base64_encode($x->id)).'" class="px-1 text-white bg-blue-800 rounded-sm "><i class="bi bi-list"></i></a>';
        return $btn_detail;
    }
    public function activenon(Request $request)
    {
        $cariStatus = Article::where('id', $request->idarticle)->first();
        $ketemu = $cariStatus->isactivearticle;
        if($ketemu=="Active"){
            Article::where('id',$request->idarticle)->update(['isactivearticle'=>"Non Active"]);
            return response()->json([
                'data'      => 'Berhasil mengupdate data',
                'statuscode'    => 200
            ]);
        } else {
            Article::where('id',$request->idarticle)->update(['isactivearticle'=>"Active"]);
            return response()->json([
                'data'      => 'Berhasil mengupdate data',
                'statuscode'    => 200
            ]);
        }
    }
    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json([
            'slug'      => $slug
        ]);
    }
    public function stored(Request $request)
    {
        try {
            $validasiData = $request->validate([
                'judul'             => 'required',
                'selectcategory'    => 'required',
                // 'headerpicture'     => 'required',
                // 'editor1'           => 'required'
            ]);
            $dataStrore = [
                'judul'             => $request->judul,
                'slug'              => $request->slug,
                // 'headerpicture'     => $filenamesimpan,
                'categoriesid'      => $request->selectcategory,
                'article'           => $request->editor1,
                'usersid'            => auth()->user()->id
            ];
            if($request->hasFile('headerpicture')){
                $validasiData['headerpicture']  = 'required';
                $files = $request->file('headerpicture');
                $filenameWithExtension      = $request->file('headerpicture')->getClientOriginalExtension();
                $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                $extension                  = $files->getClientOriginalExtension();
                $filenamesimpan             = 'article-' . time() . '.' . $extension;
                $files->move('images', $filenamesimpan);
                $dataStrore['headerpicture']    = $filenamesimpan;
            } else {
                $dataStrore['headerpicture']    = 'headerdefault.jpg';
            }

            Article::create($dataStrore);
            return response()->json([
                'message'       => $request->session()->flash('message', 'Data Article berhasil di simpan.!')
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message'       => $request->session()->flash('message', 'Something went wrong.!')
            ], 200);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul'             => 'required',
                'selectcategory'    => 'required',
                // 'photo'             => 'required|image',
                'editor1'           => 'required'
            ]);
            if($request->headerpicture != ""){
                $files = $request->file('headerpicture');
                $filenameWithExtension      = $request->file('headerpicture')->getClientOriginalExtension();
                $filename                   = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                $extension                  = $files->getClientOriginalExtension();
                $filenamesimpan             = 'article-' . time() . '.' . $extension;
                $files->move('images', $filenamesimpan);
                $dataStrore = [
                    'judul'             => $request->judul,
                    'headerpicture'     => $filenamesimpan,
                    'categoriesid'      => $request->selectcategory,
                    'article'           => $request->editor1,
                    'usersid'           => auth()->user()->id
                ];
                Article::where('id', base64_decode($id))->update($dataStrore);
                return redirect()->back()->with('message', 'Data Article berhasil di simpan.!');
            } else {
                $dataStrore = [
                    'judul'             => $request->judul,
                    'categoriesid'      => $request->selectcategory,
                    'article'           => $request->editor1,
                    'usersid'           => auth()->user()->id
                ];
                Article::where('id', base64_decode($id))->update($dataStrore);
                return redirect()->back()->with('message', 'Data Article berhasil di simpan.!');
            }
        } catch (Exception $error) {
            return redirect()->back()->with('message', 'Data Article gagal di simpan.!');
        }
    }
    public function views(Request $request, $id)
    {
        $data = [
            'title'         => 'S-Panel | Article',
            'head'          => 'Article',
            'breadcumb1'    => 'Article',
            'breadcumb2'    => 'Views',
            'dataArticle'   => Article::with(['user','categori'])->where('id', base64_decode($id))->firstOrFail()
        ];
        return view('adminpanel.pages.article.views', $data);
    }
}
