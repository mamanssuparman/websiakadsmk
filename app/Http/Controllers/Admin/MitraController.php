<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MitraController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Mitra',
            'head'          => 'Mitra',
            'breadcumb1'    => 'Mitra',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.mitra.index', $data);
    }

    // Get List Data Mitra
    public function getListMitra(Request $request)
    {
        $orderBy = 'mitra.namamitra';

        switch ($request->input('order.3.column')) {
            case '1':
                $orderBy = 'mitra.namamitra';
                break;
        }

        $orderSort = $request->input('order.0.dir');

        $data = DB::table('mitra');

        if($request->input('search.value')!= null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(namamitra) like ?',['%'.$request->input('search.value').'%']);
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
            $row[] = $x->namamitra;
            $row[] = $this->_pictures($x);
            $row[] = $this->_toggle($x);
            $row[] = $this->_btn_edit($x);
            $data1 [] = $row;
        }
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal'  => $recordsTotal,
            'recordsFiltered'   => $recordsFiltered,
            'data'  => $data1,
        ]);
    }
    // Pictures Mitra
    private function _pictures($x)
    {
        $picture = '
        <img src="/images/'.$x->picture.'" alt="foto" width="200" class="rounded-md"></td>
        ';
        return $picture;
    }
    // Toggle Status Active dan Non Active
    private function _toggle($x)
    {
        $statustoogle = $x->statusmitra;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="aktifnonmitra(this,'.$x->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="aktifnonmitra(this,'.$x->id.')">';
        }
        return $togle;
    }
    private function _btn_edit($x)
    {
        $btn_detail = '<button type="button" onclick="editMitra('.$x->id.')" class="px-1 text-white bg-blue-800 rounded-sm edit "><i class="bi bi-list"></i></button>';
        return $btn_detail;
    }

    // Process Stored
    public function stored(Request $request)
    {
        try {
            $request->validate([
                'nama_mitra'            => 'required',
                'pictures'              => 'required|mimes:png,jpg'
            ]);
            $file_foto          = $request->file('pictures');
            $ekstension_foto    = $file_foto->extension();
            $nama_foto          = 'Mitra-'.date('dmyhis').'.'.$ekstension_foto;
            $file_foto->move(public_path('/images'), $nama_foto);
            $foto               = $nama_foto;

            $dataMitra = [
                'namamitra'         => $request->nama_mitra,
                'picture'           => $foto,
                'usersid'           => auth()->user()->id
            ];
            Mitra::create($dataMitra);
            return response()->json([
                'message'       => 'Data Mitra Berhasil di simpan',
                'flash'         => $request->session()->flash('success', 'Data Mitra berhasi di simpan.!')
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'message'       => 'Something went wrong',
                'flash'         => $request->session()->flash('success', 'Data Mitra gagal di simpan')
            ], 200);
        }
    }

    // Get Data Mitra Edit
    public function getDataMitra(Request $request, $id)
    {
        try {
            $dataMitra = Mitra::where('id', $id)->firstOrFail();
            return response()->json([
                'message'       => 'Get Data Succesfuly',
                'data'          => $dataMitra
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message'       => 'Something went wrong',
                'data'          => null
            ], 500);
        }
    }

    // Update Mitra
    public function updateMitra(Request $request, $id)
    {
        try {
            $request->validate([
                'nama_mitra'        => 'required',
            ]);
            $dataUpdate = [
                'namamitra'         => $request->nama_mitra
            ];
            if($request->hasFile('pictures')){
                $request->validate([
                    'pictures'      => 'mimes:png,jpg'
                ]);
                $file_foto          = $request->file('pictures');
                $ekstension_foto    = $file_foto->extension();
                $nama_foto          = 'Mitra-'.date('dmyhis').'.'.$ekstension_foto;
                $file_foto->move(public_path('/images'), $nama_foto);
                $foto               = $nama_foto;
                $dataUpdate['picture']  = $foto;
                // Delete Picture Old
                $foto_old = Mitra::where('id', $id)->firstOrFail();
                File::delete(public_path('images'.'/'.$foto_old->picture ));
            }

            Mitra::where('id', $id)->update($dataUpdate);
            return response()->json([
                'message'       => $request->session()->flash('success', 'Update data mitra berhasil.!')
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message'       => $request->session()->flash('success', 'Update data gagal.!')
            ], 500);
        }
    }
}
