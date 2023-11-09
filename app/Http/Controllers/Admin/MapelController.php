<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;
use DataTables;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Mata Pelajaran',
            'head'          => 'Mata Pelajaran',
            'breadcumb1'    => 'Mata Pelajaran',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.mapel.index', $data);
    }

    // get data category article
    public function getMapel(Request $request)
    {
        $orderBy = 'mapel.namamapel';

        switch ($request->input('order.3.column')) {
            case '1':
                $orderBy = 'mapel.namamapel';
                break;
        }

        $orderSort = $request->input('order.0.dir');

        $data = Mapel::query();

        if($request->input('search.value')!= null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(namamapel) like ?',['%'.$request->input('search.value').'%']);
            });
        }

        $recordsFiltered = $data->get()->count();

        if($request->input('length')!= -1)$data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy, 'asc')->get();

        $recordsTotal = $data->count();
        $data1 = array();
        $no = $request->input('start');
        foreach ($data as $value) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $value->namamapel;
            $row[] = $this->_toggle($value);
            $row[] = $this->_btn_detail($value);
            $row[] = $value->isactivemapel;
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
        $btn_detail = '<button type="button" data-id="'.$value->id.'" id="detail" class="edit px-1 text-white bg-blue-800 rounded-sm "><i class="bi bi-list"></i></button>';
        return $btn_detail;
    }

    // toggle active non active
    private function _toggle($value)
    {
        $statustoogle = $value->isactivemapel;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="aktifnonmapel(this,'.$value->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="aktifnonmapel(this,'.$value->id.')">';
        }
        return $togle;
    }


    // store category
    public function store(Request $request){
        $request->validate([
            "namamapel" => ['required', 'unique:mapel,namamapel'],
            'description' => ['required'],
        ]);

        $data = [
            "namamapel" => $request->namamapel,
           'description' => $request->description
        ];

        $mapel   = Mapel::create($data);
        return response()->json($mapel);
    }


    // activenon togle process
    public function activenon(Request $request){

        $mapelSelect = Mapel::firstWhere('id', $request->idmapel);
        $status = $mapelSelect->isactivemapel;
        if ($status=="Active") {
            $mapelSelect->update(['isactivemapel'=>'Non Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }else {
            $mapelSelect->update(['isactivemapel' => 'Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }

    }

    // edit
    public function edit(Request $request, $id){
            $mapelSelect = Mapel::find($id);
            return response()->json($mapelSelect);
    }

    // update
    public function update(Request $request, $id){
        $request->validate([
            "namamapel" => ['required'],
            'description' => ['required'],
        ]);

        $dataMapel = Mapel::find($id);
        $dataMapel->update([
            "namamapel" => $request->namamapel,
            "description" => $request->description
        ]);

        return response()->json();
    }
}
