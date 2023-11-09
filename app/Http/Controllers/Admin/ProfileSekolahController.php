<?php

namespace App\Http\Controllers\Admin;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProfileSekolahController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Profile',
            'head'          => 'Profile',
            'breadcumb1'    => 'Profile',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.profile.index', $data);
    }

    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Profile',
            'head'          => 'Profile',
            'breadcumb1'    => 'Profile',
            'breadcumb2'    => 'Add'
        ];
        return view('adminpanel.pages.profile.add', $data);
    }
    public function edit(Request $request, $id)
    {
        $data = [
            'title'         => 'S-Panel | Profile',
            'head'          => 'Profile',
            'breadcumb1'    => 'Profile',
            'breadcumb2'    => 'Edit',
            'dataprofile'   => Profile::where('id', base64_decode($id))->first()
        ];
        return view('adminpanel.pages.profile.edit', $data);
    }
    public function getDataProfile(Request $request)
    {
        $csrf_hash = $request->input('_token');
        $orderBy = 'profiles.judul';
        switch ($request->input('order.1.column')) {
            case '1': //untuk inisialisasi data kolom
                $orderBy = 'profiles.judul';
                break;
        }
        $orderSort = $request->input('order.0.dir');
        // Get Data Nya
        $data = DB::table('profiles');
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
    private function _toggle($x)
    {
        // $active = 'Active';
        // $non    ="Non-Active";
        $statustoogle = $x->isactiveprofile;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="activenon(this,'.$x->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="activenon(this,'.$x->id.')">';
        }
        return $togle;
    }
    private function _btn_detail($x)
    {
        $btn_detail = '<a href="'.url('admin/profile/edit/'.base64_encode($x->id)).'" class="px-1 text-white bg-blue-800 rounded-sm "><i class="bi bi-list"></i></a>';
        return $btn_detail;
    }
    public function activenon(Request $request)
    {
        $cariStatus = Profile::where('id', $request->iprofile)->first();
        $ketemu = $cariStatus->isactiveprofile;
        if($ketemu=="Active"){
            Profile::where('id',$request->iprofile)->update(['isactiveprofile'=>"Non Active"]);
            return response()->json([
                'data'      => 'Berhasil mengupdate data',
                'statuscode'    => 200
            ]);
        } else {
            Profile::where('id',$request->iprofile)->update(['isactiveprofile'=>"Active"]);
            return response()->json([
                'data'      => 'Berhasil mengupdate data',
                'statuscode'    => 200
            ]);
        }
    }
    public function checkslug(Request $request)
    {
        $slug = SlugService::createSlug(Profile::class, 'slug', $request->title);
        return response()->json([
            'slug'      => $slug
        ]);
    }
    public function stored(Request $request)
    {
        $request->validate([
            'judulprofile'          => 'required',
            'editor1'               => 'required'
        ]);
        $dataStore = [
            'judul'                 => $request->judulprofile,
            'slug'                  => $request->slug,
            'description'           => $request->editor1
        ];
        Profile::create($dataStore);
        return redirect()->back()->with('message', 'Data Profile berhasil di simpan.!');
    }
    public function updated(Request $request, $id)
    {
        $request->validate([
            'judulprofile'          => 'required',
            'editor1'               => 'required'
        ]);
        $dataStore = [
            'judul'                 => $request->judulprofile,
            'description'           => $request->editor1
        ];
        Profile::where('id',base64_decode($id))->update($dataStore);
        return redirect()->back()->with('message', 'Data Profile berhasil di perbaharui.!');
    }
}
