<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galleryvideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GallerydataController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Gallery',
            'head'          => 'Gallery',
            'breadcumb1'    => 'Gallery',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.gallery.index', $data);
    }

    // get data gallery foto
    public function getGallery(Request $request)
    {

        $orderBy = 'galleryvideos.judul';

        switch ($request->input('order.3.column')) {
            case '1':
                $orderBy = 'galleryvideos.judul';
                break;
        }

        $orderSort = $request->input('order.0.dir');

        $data = Galleryvideo::where('jenis', 'Gallery');

        if($request->input('search.value')!= null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(judul) like ?',['%'.$request->input('search.value').'%']);
            });
        }

        $recordsFiltered = $data->count();

        if($request->input('length')!= -1)$data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy,  'asc')->get();

        $recordsTotal = $data->count();
        $data1 = array();
        $no = $request->input('start');
        foreach ($data as $value) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $this->_gallery($value);
            $row[] = $this->_toggle($value);
            $row[] = $this->_btn_detail($value);
            $row[] = $value->isactivegallery;
            $data1 [] = $row;
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data1,
        ]);
    }



    // button detail
    private function _btn_detail($value)
    {
        $btn_detail = '<button type="button" data-id="'.$value->id.'" id="detail" class="px-1 text-white bg-blue-800 rounded-sm edit "><i class="bi bi-list"></i></button>';
        return $btn_detail;
    }

    // toggle active non active
    private function _toggle($value)
    {
        $statustoogle = $value->isactivegallery;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="aktifnoncategory(this,'.$value->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="aktifnoncategory(this,'.$value->id.')">';
        }
        return $togle;
    }

    // gallery photo
    private function _gallery($value)
    {
        $htmlGallery = '
            <img src="/images/'.$value->picture.'" alt="foto" width="200" class="rounded-md"></td>
        ';
        return $htmlGallery;
    }

    // activenon togle process
    public function activenon(Request $request){

        $categorySelect = Galleryvideo::firstWhere('id', $request->idgallery);
        $status = $categorySelect->isactivegallery;
        if ($status=="Active") {
            $categorySelect->update(['isactivegallery'=>'Non Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }else {
            $categorySelect->update(['isactivegallery' => 'Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }

    }


    // store gallery
    public function store(Request $request){
        $request->validate([
            "judul"         => ['required', 'unique:ekstras,judul'],
            // "jenis"         => ['required'],
            "foto"          => ['required', 'mimes:png,jpg,webp,pdf,png,jpeg, gif'],
        ]);

        $file_foto        = $request->file('foto');
        $ekstensi_foto    = $file_foto->extension();
        $nama_foto        = 'Gallery-'.date('dmyhis').'.'.$ekstensi_foto;
        $file_foto->move(public_path('/images'), $nama_foto);
        $foto = $nama_foto;

        $data_ekstra = [
            "judul"             =>  $request->judul,
            "jenis"             =>  "Gallery",
            "picture"           =>  $foto,
            "usersid"            =>  Auth::id()
        ];


        $galleryVideo = Galleryvideo::create($data_ekstra);

        return response()->json($galleryVideo);
    }


    public function edit($id){
        $dataGallery = Galleryvideo::find($id);
        return response()->json($dataGallery);
    }


    // update gallery
    public function update(Request $request, $id){
        $request->validate([
            "judul"    => ['required'],
            // "jenis"    => ['required'],
            // "foto"     => ['mimes:png,jpg,webp,pdf,png,jpeg, gif'],
        ]);

        $data_gallery = [
            "judul"       => $request->judul,
        ];

        $gallery = Galleryvideo::find($id);

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto'    => 'required'
            ]);
            $file_gambar        = $request->file('foto');
            $ekstensi_gambar    = $file_gambar->extension();
            $nama_gambar        = 'Gallery-'.date('dmyhis').'.'.$ekstensi_gambar;
            $file_gambar->move(public_path('/images'), $nama_gambar);

            $foto_old = Galleryvideo::firstWhere('id', $id);
            File::delete(public_path('images'.'/'.$foto_old->picture ));

            $data_gallery['picture'] = $nama_gambar;
        }

        $gallery->update($data_gallery);
        return response()->json($gallery);
    }


}
