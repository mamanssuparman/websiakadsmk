<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\Prestasiprodi;
use App\Models\Mapelproduktif;
use App\Models\Pekerjaanproduktif;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\File;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProdiController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Program Studi',
            'head'          => 'Program Studi',
            'breadcumb1'    => 'Program Studi',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.programstudi.index', $data);
    }
    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Program Studi',
            'head'          => 'Program Studi',
            'breadcumb1'    => 'Program Studi',
            'breadcumb2'    => 'Add',
            'datakajur'     => User::where('statususers', 'Active')->where('jabatan', '!=','Kepala Sekolah')->where('jabatan', '!=', 'Tenaga Kependidikan')->get()
        ];
        return view('adminpanel.pages.programstudi.add', $data);
    }
    public function detail(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Program Studi',
            'head'          => 'Program Studi',
            'breadcumb1'    => 'Program Studi',
            'breadcumb2'    => 'Detail and Edit'
        ];
        return view('adminpanel.pages.programstudi.edit', $data);
    }

    public function getDataProdi(Request $request)
    {
        $csrf_hash = $request->input('_token');
        $orderBy = 'prodis.judul';
        switch ($request->input('order.1.column')) {
            case '1': //untuk inisialisasi data kolom
                $orderBy = 'prodis.judul';
                break;
        }
        $orderSort = $request->input('order.0.dir');
        // Get Data Nya
        $data = DB::table('prodis');
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
            $row[] = $x->judul;
            $row[] = $x->judul;
            $data1 [] = $row;
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data1,
        ]);
    }
    public function saveprodi(Request $request)
    {
        try {
            $validasi =  $request->validate([
                'nama_prodi'            => 'required',
                'singkatan'             => 'required',
                'ketua_jurusan'         => 'required',
                'deskripsi'             => 'required',
                'logo'                  => ['required',File::image()->max('2mb')]
            ]);
            $imagesName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('images'),$imagesName);
            $dataStoreProdis = [
                'kajurid'       => $request->ketua_jurusan,
                'sinonim'       => $request->singkatan,
                'judul'         => $request->nama_prodi,
                'slug'          => $request->slug,
                'logoprodi'     => $imagesName,
                'description'   => $request->deskripsi
            ];
            $saveProdi = Prodi::create($dataStoreProdis);
            $p = $request->input();
            if($p['prestasi_name']){
                foreach ($p['prestasi_name'] as $key => $x) {
                    Prestasiprodi::create([
                        'prodiid'       => $saveProdi->id,
                        'deskripsi'     => $p['prestasi_name'][$key]
                    ]);
                }
            }
            if($p['pekerjaan_name']){
                foreach ($p['pekerjaan_name'] as $key => $x) {
                    Pekerjaanproduktif::create([
                        'prodiid'       => $saveProdi->id,
                        'deskripsi'     => $p['pekerjaan_name'][$key]
                    ]);
                }
            }
            if($p['mapel_ajar']){
                foreach ($p['mapel_ajar'] as $key => $x) {
                    Mapelproduktif::Create([
                        'prodiid'       => $saveProdi->id,
                        'deskripsi'     => $p['mapel_ajar'][$key]
                    ]);
                }
            }
            return redirect()->back()->with('message','Data Prodi berhasil di simpan.!');
        } catch (Exception $e) {
            return response()->json([
                'statuscode'        =>500,
                'message'           => $e->getMessage()
            ]);
        }
    }

    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(Prodi::class, 'slug', $request->title);
        return response()->json([
            'slug'      => $slug
        ]);
    }
}
