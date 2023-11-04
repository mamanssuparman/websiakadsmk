<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Mapel;
use Illuminate\Http\Request;
use App\Models\Mapelajarguru;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class GtkDataController extends Controller
{
    public function index(Request $request )
    {
        $data = [
            'title'         => 'S-Panel | GTK',
            'head'          => 'GTK',
            'breadcumb1'    => 'GTK',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.gtk.index', $data);
    }
    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | GTK',
            'head'          => 'GTK',
            'breadcumb1'    => 'GTK',
            'breadcumb2'    => 'Add'
        ];
        return view('adminpanel.pages.gtk.add', $data);
    }
    public function detail(Request $request, $id)
    {
        $data = [
            'title'         => 'S-Panel | GTK',
            'head'          => 'GTK',
            'breadcumb1'    => 'GTK',
            'breadcumb2'    => 'Detail'
        ];
        return view('adminpanel.pages.gtk.detail', $data);
    }
    public function getDataGtk(Request $request)
    {
        $csrf_hash = $request->input('_token');
        $orderBy = 'users.nama';
        switch ($request->input('order.3.column')) {
            case '1': //untuk inisialisasi data kolom
                $orderBy = 'users.nama';
                break;
        }
        $orderSort = $request->input('order.0.dir');
        // Get Data Nya
        $data = User::where('role', '!=','User');
        // Function filter dari inputan search
        if($request->input('search.value')!= null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(nuptk) like ?',['%'.$request->input('search.value').'%']);
                $q->orWhereRaw('LOWER(nip) like ?',['%'.$request->input('search.value').'%']);
                $q->orWhereRaw('LOWER(nama) like ?',['%'.$request->input('search.value').'%']);
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
            $row[] = $x->nuptk;
            $row[] = $x->nip;
            $row[] = $x->nama;
            $row[] = $x->jabatan;
            $row[] = $this->_toggle($x);
            $row[] = $this->_btn_detail($x);
            $data1 [] = $row;
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data1,
        ]);
    }
    private function _btn_detail($x)
    {
        $btn_detail = '<a href="'.url('admin/gtk/detail/'.base64_encode($x->id)).'" class="px-1 text-white bg-blue-800 rounded-sm "><i class="bi bi-list"></i></a>';
        return $btn_detail;
    }
    private function _toggle($x)
    {
        $active = 'Active';
        $non    ="Non-Active";
        $statustoogle = $x->statususers;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="aktifnonuseres(this,'.$x->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="aktifnonuseres(this,'.$x->id.')">';
        }
        return $togle;
    }
    public function getData(Request $request, $id)
    {
        $getDataDetail = User::where('id', $id)->first();
        if($getDataDetail){
            $dataJSON = [
                'statuscode'    => 200,
                'data'          => $getDataDetail,
                'message'       => 'berhasil mengambil data'
            ];
        } else {
            $dataJSON = [
                'statuscode'    => 500,
                'message'       => 'Gagal mengambil data'
            ];
        }
        $getDataMapelAjar = Mapelajarguru::with('mapel')->where('guruid', $id)->get();
        if($getDataMapelAjar){
            $dataJSONMapel = [
                'statuscode'    => 200,
                'data'          => $getDataMapelAjar,
                'message'       => 'berhasil mengambil data'
            ];
        } else {
            $dataJSONMapel = [
                'statuscode'    => 500,
                'message'       => 'Gagal mengambil data'
            ];
        }
        return response()->json([
            'datadetail'    => $dataJSON,
            'datamapelajar' => $dataJSONMapel
        ]);
    }

    public function activenon(Request $request)
    {
        $cariStatus = User::where('id', $request->iuser)->first();
        $ketemu = $cariStatus->statususers;
        if($ketemu=="Active"){
            User::where('id',$request->iuser)->update(['statususers'=>"Non Active"]);
            return response()->json([
                'data'      => 'Berhasil mengupdate data',
                'statuscode'    => 200
            ]);
        } else {
            User::where('id',$request->iuser)->update(['statususers'=>"Active"]);
            return response()->json([
                'data'      => 'Berhasil mengupdate data',
                'statuscode'    => 200
            ]);
        }
    }

    public function getDataMapel(Request $request)
    {
        $csrf_hash = $request->input('_token');
        $orderBy = 'mapel.namamapel';
        switch ($request->input('order.0.column')) {
            case '1': //untuk inisialisasi data kolom
                $orderBy = 'mapel.namamapel';
                break;
        }
        $orderSort = $request->input('order.0.dir');
        // Get Data Nya
        $data = Mapel::where('isactivemapel','!=','Non Active');
        // Function filter dari inputan search
        if($request->input('search.value')!= null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(namamapel) like ?',['%'.$request->input('search.value').'%']);
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
            $row[] = $x->namamapel;
            $row[] = $this->_choosemapel($x);
            $data1 [] = $row;
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data1,
        ]);
    }
    private function _choosemapel($x)
    {
        $btnchoosemapel = '<button type="button" class="px-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-check" onclick="pilihmapel(this,'.$x->id.','."'$x->namamapel'".' )" data-modal-hide="default-modal"></button>';
        return $btnchoosemapel;
    }
    public function addMapelAjar(Request $request)
    {
        $data = [
            'guruid' => $request->guruid,
            'mapelid' => $request->mapelid
        ];
        Mapelajarguru::create($data);
        return response()->json([
            'statuscode'        => 200,
            'message'           => 'data berhasil di simpan'
        ]);
    }
    public function removemapelajar(Request $request)
    {
        Mapelajarguru::where('id', $request->imapelajar)->delete();
        return response()->json([
            'statuscode'        => 200,
            'message'           => 'data berhasil di hapus'
        ]);
    }
    public function updateprofile(Request $request)
    {
        $validation = $request->validate([
            'textnama'                  => 'required',
            'selectJenisKelamin'        => 'required',
            'textalamat'                => 'required',
            'selectpendidikanTerakhir'  => 'required',
            'selectjabatan'             => 'required',
            'selecttugasTambahan'       => 'required',
            'selectrole'                => 'required',
        ]);
        if($request->fotoProfile == ""){
            $dataStore = [
                'nuptk'                 => $request->nuptk,
                'nip'                   => $request->nip,
                'nama'                  => $request->textnama,
                'alamat'                => $request->textalamat,
                'jeniskelamin'          => $request->selectJenisKelamin,
                'pendidikanterakhir'    => $request->selectpendidikanTerakhir,
                'jabatan'               => $request->selectjabatan,
                'tugastambahan'         => $request->selecttugasTambahan,
                'role'                  => $request->selectrole,
            ];
            User::where('id', base64_decode($request->guruid))->update($dataStore);
            return redirect()->back()->with('success','Profil berhasil di perbaharui');
        } else {
            $imagesName     = time().'.'.$request->fotoProfile->extension();
            $request->fotoProfile->move(public_path('images'),$imagesName);
            $dataStore = [
                'nuptk'                 => $request->nuptk,
                'nip'                   => $request->nip,
                'nama'                  => $request->textnama,
                'alamat'                => $request->textalamat,
                'jeniskelamin'          => $request->selectJenisKelamin,
                'pendidikanterakhir'    => $request->selectpendidikanTerakhir,
                'jabatan'               => $request->selectjabatan,
                'tugastambahan'         => $request->selecttugasTambahan,
                'role'                  => $request->selectrole,
                'photos'                => $imagesName
            ];
            User::where('id', base64_decode($request->guruid))->update($dataStore);
            return redirect()->back()->with('success','Profil berhasil di perbaharui');
        }
    }
    public function stored(Request $request)
    {
        $request->validate([
            'textNama'              => 'required',
            'selectJenisKelamin'    => 'required',
            'textAlamat'            => 'required',
            'selectPendidikanTerakhir'          => 'required',
            'selectJabatan'                     => 'required',
            'selectTugasTambahan'               => 'required',
            'selectRole'                        => 'required',
            'textemail'                         => 'unique:users,email'
        ]);
        if($request->fotoProfile == ""){
            $dataStore = [
                'nutpk'                 => $request->nuptk,
                'nip'                   => $request->nip,
                'nama'                  => $request->textNama,
                'alamat'                => $request->textAlamat,
                'jeniskelamin'          => $request->selectJenisKelamin,
                'pendidikanterakhir'    => $request->selectPendidikanTerakhir,
                'jabatan'               => $request->selectJabatan,
                'tugastambahan'         => $request->selectTugasTambahan,
                'role'                  => $request->selectRole,
                'photos'                => 'default.jpg',
                'email'                 => $request->textemail,
                'password'              => Hash::make('1234567')
            ];
            User::create($dataStore);
            return redirect()->back()->with('success', 'Data GTK berhasil di simpan');
        } else {
            $imagesName     = time().'.'.$request->fotoProfile->extension();
            $request->fotoProfile->move(public_path('images'),$imagesName);
            $dataStore = [
                'nutpk'                 => $request->nuptk,
                'nip'                   => $request->nip,
                'nama'                  => $request->textNama,
                'alamat'                => $request->textAlamat,
                'jeniskelamin'          => $request->selectJenisKelamin,
                'pendidikanterakhir'    => $request->selectPendidikanTerakhir,
                'jabatan'               => $request->selectJabatan,
                'tugastambahan'         => $request->selectTugasTambahan,
                'role'                  => $request->selectRole,
                'photos'                => $imagesName,
                'email'                 => $request->textemail,
                'password'              => Hash::make('1234567')
            ];
            User::create($dataStore);
            return redirect()->back()->with('success', 'Data GTK berhasil di simpan');
        }
    }
}
