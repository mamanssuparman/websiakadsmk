<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\Mapelajarguru;
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
    public function detail(Request $request, $id)
    {
        $data = [
            'title'         => 'S-Panel | Program Studi',
            'head'          => 'Program Studi',
            'breadcumb1'    => 'Program Studi',
            'breadcumb2'    => 'Detail and Edit',
            'datakajur'     => User::where('statususers', 'Active')->where('jabatan', '!=','Kepala Sekolah')->where('jabatan', '!=', 'Tenaga Kependidikan')->get(),
            'dataprodi'     => Prodi::where('id',base64_decode($id))->firstOrFail()
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
            $row[] = $this->_toggle($x);
            $row[] = $this->_btn_detail($x).' '.$this->_views_detail($x);
            $data1 [] = $row;
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data1,
        ]);
    }
    private function _views_detail($x)
    {
        $views= '<a href="'.url('admin').'/prodi/views/'.base64_encode($x->id).'" class="px-1 bg-green-600 rounded-sm" title="Views Detail Program Studi"><i class="text-white bi bi-eye-fill"></i></a>';
        return $views;
    }
    private function _toggle($x)
    {
        // $active = 'Active';
        // $non    ="Non-Active";
        $statustoogle = $x->isactiveprodi;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="activenon(this,'.$x->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="activenon(this,'.$x->id.')">';
        }
        return $togle;
    }
    public function activenon(Request $request)
    {
        $cariStatus = Prodi::where('id', $request->iprodi)->first();
        $ketemu = $cariStatus->isactiveprodi;
        if($ketemu=="Active"){
            Prodi::where('id',$request->iprodi)->update(['isactiveprodi'=>"Non Active"]);
            return response()->json([
                'data'      => 'Berhasil mengupdate data',
                'statuscode'    => 200
            ]);
        } else {
            Prodi::where('id',$request->iprodi)->update(['isactiveprodi'=>"Active"]);
            return response()->json([
                'data'      => 'Berhasil mengupdate data',
                'statuscode'    => 200
            ]);
        }
    }
    private function _btn_detail($x)
    {
        $btn_detail = '<a href="'.url('admin/prodi/detail/'.base64_encode($x->id)).'" class="px-1 text-white bg-blue-800 rounded-sm "><i class="bi bi-list"></i></a>';
        return $btn_detail;
    }
    public function saveprodi(Request $request)
    {
        try {
            $validasi =  $request->validate([
                'nama_prodi'            => 'required',
                'singkatan'             => 'required',
                'ketua_jurusan'         => 'required',
                'deskripsi'             => 'required',
                'logo'                  => ['required',File::image()->max('1mb')]
            ]);
            $imagesName = 'prodi-'.time().'.'.$request->logo->extension();
            $request->logo->storeAs('public/images',$imagesName);
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
            if(isset($p['prestasi_name'])){
                foreach ($p['prestasi_name'] as $key => $x) {
                    Prestasiprodi::create([
                        'prodiid'       => $saveProdi->id,
                        'deskripsi'     => $p['prestasi_name'][$key]
                    ]);
                }
            }
            if(isset($p['pekerjaan_name'])){
                foreach ($p['pekerjaan_name'] as $key => $x) {
                    Pekerjaanproduktif::create([
                        'prodiid'       => $saveProdi->id,
                        'deskripsi'     => $p['pekerjaan_name'][$key]
                    ]);
                }
            }
            if(isset($p['mapel_ajar'])){
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

    public function getData(Request $request, $id)
    {
        try {
            $getdataprestasi = Prestasiprodi::where('prodiid', $id)->get();
            if($getdataprestasi){
                $jsonPrestasi = [
                    'statuscode'        => 200,
                    'message'           => 'Berhasil mengambil data',
                    'data'              => $getdataprestasi
                ];
            } else {
                $jsonPrestasi = [
                    'statuscode'        => 500,
                    'message'           => 'Gagal mengambil data'
                ];
            }
            $getdatapekerjaan = Pekerjaanproduktif::where('prodiid', $id)->get();
            if($getdatapekerjaan){
                $jsonPekerjaan = [
                    'statuscode'        => 200,
                    'message'           => 'Berhasil mengambil data',
                    'data'              => $getdatapekerjaan
                ];
            } else {
                $jsonPekerjaan = [
                    'statuscode'        => 500,
                    'message'           => 'Gagal mengambil data'
                ];
            }
            $getdatamapelajar = Mapelproduktif::where('prodiid', $id)->get();
            if($getdatamapelajar){
                $jsonMapelAjar = [
                    'statuscode'        => 200,
                    'message'           => 'Berhasil mengambim data',
                    'data'              => $getdatamapelajar
                ];
            } else {
                $jsonMapelAjar = [
                    'statuscode'        => 500,
                    'message'           => 'Gagal mengambil data'
                ];
            }
            return response()->json([
                'dataprestasi'          => $jsonPrestasi,
                'datapekerjaan'         => $jsonPekerjaan,
                'datamapelajar'         => $jsonMapelAjar
            ]);
        } catch (Exception $error) {
            return response()->json([
                'statuscode'            => 404,
                'message'               => 'Something went wrong'
            ]);
        }
    }
    public function removePrestasi(Request $request)
    {
        try {
            $request->validate([
                'id'            => 'required'
            ]);
            Prestasiprodi::where('id', $request->id)->delete();
            return response()->json([
                'statuscode'            => 200,
                'message'               => 'Data has been deleted'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'error'     => $error
            ]);
        }
    }
    public function addPrestasi(Request $request)
    {
        try {
            $request->validate([
                'namaprestasi'      => 'required'
            ]);
            $savePrestasi = Prestasiprodi::create([
                'deskripsi'         => $request->namaprestasi,
                'prodiid'           => $request->idprodi
            ]);
            return response()->json([
                'statuscode'        => 200,
                'message'           => 'Data prestasi berhasil di tambahkan',
                'idprestasi'        => $savePrestasi->id
            ]);
        } catch (Exception $error) {
            return response()->json([
                'statuscode'        => 500,
                'message'           => 'Something went wrong'
            ]);
        }
    }
    public function addPekerjaan(Request $request)
    {
        try {
            $request->validate([
                'namapekerjaan'      => 'required'
            ]);
            $savePekerjaan = Pekerjaanproduktif::create([
                'deskripsi'         => $request->namapekerjaan,
                'prodiid'           => $request->idprodi
            ]);
            return response()->json([
                'statuscode'        => 200,
                'message'           => 'Data prestasi berhasil di tambahkan',
                'idprestasi'        => $savePekerjaan->id
            ]);
        } catch (Exception $error) {
            return response()->json([
                'statuscode'        => 500,
                'message'           => 'Something went wrong'
            ]);
        }
    }
    public function removePekerjaan(Request $request)
    {
        try {
            $request->validate([
                'id'            => 'required'
            ]);
            Pekerjaanproduktif::where('id', $request->id)->delete();
            return response()->json([
                'statuscode'            => 200,
                'message'               => 'Data has been deleted'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'error'     => $error
            ]);
        }
    }
    public function addMapelAjar(Request $request)
    {
        try {
            $request->validate([
                'namamapelajar'      => 'required'
            ]);
            $saveMapelProduktif = Mapelproduktif::create([
                'deskripsi'         => $request->namamapelajar,
                'prodiid'           => $request->idprodi
            ]);
            return response()->json([
                'statuscode'        => 200,
                'message'           => 'Data Mapel Produktif berhasil di tambahkan',
                'idmapel'           => $saveMapelProduktif->id
            ]);
        } catch (Exception $error) {
            return response()->json([
                'statuscode'        => 500,
                'message'           => 'Something went wrong'
            ]);
        }
    }
    public function removeMapelAjar(Request $request)
    {
        try {
            $request->validate([
                'id'            => 'required'
            ]);
            Mapelproduktif::where('id', $request->id)->delete();
            return response()->json([
                'statuscode'            => 200,
                'message'               => 'Data has been deleted'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'error'     => $error
            ]);
        }
    }
    public function updateProdi(Request $request, $id)
    {
        try {
            $validasi =  $request->validate([
                'nama_prodi'            => 'required',
                'singkatan'             => 'required',
                'ketua_jurusan'         => 'required',
                'deskripsi'             => 'required',
            ]);
            if($request->logo){
                $request->validate([
                    'logo'      =>      'required|mimes:png,jpg|max:2048'
                ]);
                $imagesName = 'prodi-'.time().'.'.$request->logo->extension();
                $request->logo->storeAs('public/images', $imagesName);
                $dataUpdateProdi = [
                    'kajurid'       => $request->ketua_jurusan,
                    'sinonim'       => $request->singkatan,
                    'judul'         => $request->nama_prodi,
                    'logoprodi'     => $imagesName,
                    'description'   => $request->deskripsi
                ];
                Prodi::where('id', base64_decode($id))->update($dataUpdateProdi);
                return redirect()->back()->with('message', 'Data Prodi berhasi di perbaharui.!');
            } else {
                $dataUpdateProdi = [
                    'kajurid'       => $request->ketua_jurusan,
                    'sinonim'       => $request->singkatan,
                    'judul'         => $request->nama_prodi,
                    // 'logoprodi'     => $imagesName,
                    'description'   => $request->deskripsi
                ];
                Prodi::where('id', base64_decode($id))->update($dataUpdateProdi);
                return redirect()->back()->with('message', 'Data Prodi berhasi di perbaharui.!');
            }
        } catch (Exception $error) {
            return redirect()->back()->with('message', $error);
        }
    }
    public function views(Request $request, $id)
    {
        $data = [
            'title'         => 'S-Panel | Program Studi',
            'head'          => 'Program Studi',
            'breadcumb1'    => 'Program Studi',
            'breadcumb2'    => 'Views Detail',
            'dataprodi'     => Prodi::with(['kajur'])->where('id', base64_decode($id))->firstOrFail(),
            'datamapel'     => Mapelproduktif::where('prodiid', base64_decode($id))->get(),
            'datapekerjaan' => Pekerjaanproduktif::where('prodiid', base64_decode($id))->get(),
            'dataprestasi'  => Prestasiprodi::where('prodiid', base64_decode($id))->get()
        ];
        return view('adminpanel.pages.programstudi.views', $data);
    }
}
