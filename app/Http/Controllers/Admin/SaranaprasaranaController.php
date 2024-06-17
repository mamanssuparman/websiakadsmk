<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Saranaprasarana;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SaranaprasaranaController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Sarana',
            'head'          => 'Sarana',
            'breadcumb1'    => 'Sarana',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.sarana.index', $data);
    }

    // Get Data Sarana
    public function getSarana(Request $request)
    {

        $orderBy = 'saranaprasarana.judul';

        switch ($request->input('order.3.column')) {
            case '1':
                $orderBy = 'saranaprasarana.judul';
                break;
        }

        $orderSort = $request->input('order.0.dir');

        $data = DB::table('saranaprasarana');

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
            $row[] = $this->_gallery($x);
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

    private function _gallery($x)
    {
        $gallery = '<img src="/images/'.$x->pictures.'" width="200" class="rounded-md">';
        return $gallery;
    }

    private function _toggle($x)
    {
        $statustoogle = $x->isactivesarana;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="aktifnonsarana(this,'.$x->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="aktifnonsarana(this,'.$x->id.')">';
        }
        return $togle;
    }
    private function _btn_detail($x)
    {
        $btn_detail = '<button type="button" onclick="detailSarana(this,'.$x->id.')" id="detail" class="px-1 text-white bg-blue-800 rounded-sm edit "><i class="bi bi-list"></i></button>';
        return $btn_detail;
    }

    public function getDataSarana(Request $request, $id)
    {
        try {
            $getDataSarana = Saranaprasarana::where('id', $id)->firstOrFail();
            return response()->json([
                'message'       => 'Data berhasil di ambil',
                'data'          => $getDataSarana
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message'       => 'Something went wrong',
                'data'          => null
            ], 500);
        }
    }
    public function stored(Request $request)
    {
        try {
            $request->validate([
                'sarana'        => 'required',
                'foto'          => 'required|mimes:png,jpg'
            ]);
            $file_foto        = $request->file('foto');
            $ekstensi_foto    = $file_foto->extension();
            $nama_foto        = 'sarana-'.date('dmyhis').'.'.$ekstensi_foto;
            $file_foto->move(public_path('/images'), $nama_foto);
            $foto = $nama_foto;

            $dataSrored = [
                'judul'         => $request->sarana,
                'pictures'      => $foto,
                'usersid'       => auth()->user()->id
            ];
            Saranaprasarana::create($dataSrored);
            return response()->json([
                'message'       => 'Data berhasil di simpan',
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message'       => 'Something went wrong',
                'data'          => $error
            ], 500);
        }
    }

    public function updated(Request $request, $id)
    {
        try {
            $request->validate([
                'sarana'        => 'required'
            ]);
            $dataUpdate = [
                'judul'         => $request->sarana,
                'usersid'       => auth()->user()->id
            ];
            $saranaOld = Saranaprasarana::where('id', $id)->firstOrFail();
            if($request->hasFile('foto')){
                $request->validate([
                    'foto'          => 'required|mimes:png,jpg'
                ]);
                $file_foto        = $request->file('foto');
                $ekstensi_foto    = $file_foto->extension();
                $nama_foto        = 'sarana-'.date('dmyhis').'.'.$ekstensi_foto;
                $file_foto->move(public_path('/images'), $nama_foto);
                $foto = $nama_foto;
                // Delete Old Sarana
                File::delete(public_path('images/'.$saranaOld->pictures));
                $dataUpdate['pictures'] = $foto;
            }
            Saranaprasarana::where('id', $id)->update($dataUpdate);
            return response()->json([
                'message'       => 'Data Berhasil di perbaharui',
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'message'       => 'Something went wrong'
            ], 500);
        }
    }

    // Activenon
    public function activenon(Request $request)
    {
        $bannerSelect = Saranaprasarana::where('id',$request->idsarana)->firstOrFail();
        $status = $bannerSelect->isactivesarana;
        if($status == "Active"){
            $bannerSelect->update(['isactivesarana' => 'Non Active']);
            return response()->json(['message'=>'Updated successfully'], 200);
        } else {
            $bannerSelect->update(['isactivesarana' => 'Active']);
            return response()->json(['message'=>'Updated successfully'], 200);
        }
    }
}
