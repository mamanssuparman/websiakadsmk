<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Banner',
            'head'          => 'Banner',
            'breadcumb1'    => 'Banner',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.banner.index', $data);
    }
    // get data Banner
    public function getBanner(Request $request)
    {
        $orderBy = 'banners.judul';

        switch ($request->input('order.1.column')) {
            case '1':
                $orderBy = 'banners.judul';
                break;
        }

        $orderSort = $request->input('order.0.dir');

        $data = DB::table('banners');

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
        foreach ($data as $x) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $x->judul;
            $row[] = $this->_toggle($x);
            $row[] = $this->_detail($x);
            $data1 [] = $row;
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data1,
        ]);
    }
    private function _toggle($x)
    {
        $statustoogle = $x->statusbanner;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="aktifnonbanner(this,'.$x->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="aktifnonbanner(this,'.$x->id.')">';
        }
        return $togle;
    }
    private function _detail($x)
    {
        $btndetail = '<button class="px-1 text-sm text-white bg-blue-500 rounded-sm" onclick="detail(this,'."'$x->id'".')"><i class="bi bi-list"></i></button>';
        return $btndetail;
    }
    public function store(Request $request)
    {
       try {
            $request->validate([
                "judul"         => 'required',
                "urls"          => 'required',
                "foto"          => 'required|mimes:png,jpg,jpeg'
            ]);
            $file_foto      = $request->file('foto');
            $ekstensi_foto  = $file_foto->extension();
            $nama_foto      = 'banners-'.date('dmyhis').'.'.$ekstensi_foto;
            $file_foto->move(public_path('/images'),$nama_foto);
            $foto = $nama_foto;
            $data_banner = [
                'judul'         => $request->judul,
                'pictures'      => $foto,
                'urls'          => $request->urls,
                'usersid'       => auth()->user()->id
            ];
            Banner::create($data_banner);
            return response()->json([
                'statuscode'        => 200,
                'message'           => 'Data berhasil di simpan',
            ]);
       } catch (Exception $error) {
            return response()->json([
                'statuscode'        => 500,
                'message'           => 'Someting went wrong',
                'data'              => $error
            ]);
       }
    }

    public function getDataBanner(Request $request)
    {
        try {
            $request->validate([
                'iBanner'           => 'required'
            ]);
            $data_banner = Banner::where('id', $request->iBanner)->firstOrFail();
            return response()->json([
                'statuscode'        => 200,
                'message'           => 'berhasil mengambil data',
                'data'              => $data_banner
            ]);
        } catch (Exception $error) {
            return response()->json([
                'statuscode'        => 500,
                'message'           => 'something went wrong',
                'data'              => null
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'judul'             => 'required',
                'urls'              => 'required'
            ]);
            $data_update = [
                'judul'             => $request->judul,
                'urls'              => $request->urls,
                'usersid'           => auth()->user()->id
            ];
            if($request->hasFile('pictures')){
                $request->validate([
                    'pictures'      => 'required|mimes:png,jpg,jpeg'
                ]);
                $file_foto          = $request->file('pictures');
                $ekstensi_foto      = $file_foto->extension();
                $nama_foto          = date('dmyhis').'.'.$ekstensi_foto;
                $file_foto->move(public_path('/images'),$nama_foto);
                $foto_old = Banner::firstWhere('id', $id);
                File::delete(public_path('images'.'/'.$foto_old->pictures));
                $data_update['pictures']    = $nama_foto;
            }
            Banner::where('id', $id)->update($data_update);
            return response()->json([
                'statuscode'        => 200,
                'message'           => 'Data has been updated'
            ]);
        } catch (Exception $error) {
            return response()->josn([
                'statuscode'        => 500,
                'message'           => 'something when wrong'
            ]);
        }
    }
    public function activenon(Request $request)
    {
        $categorySelect = Banner::firstWhere('id', $request->idbanner);
        $status = $categorySelect->statusbanner;
        if ($status=="Active") {
            $categorySelect->update(['statusbanner'=>'Non Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }else {
            $categorySelect->update(['statusbanner' => 'Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }
    }
}
