<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

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
}
