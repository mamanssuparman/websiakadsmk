<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categori;
use Illuminate\Http\Request;
use DataTables;
class CategoryarticleController extends Controller
{
    // show index category article
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Category Article',
            'head'          => 'Category Article',
            'breadcumb1'    => 'Category Article',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.categoryarticle.index', $data);
    }

    // get data category article
    public function getCategoryarticle(Request $request)
    {

        $orderBy = 'categories.categoryname';

        switch ($request->input('order.3.column')) {
            case '1': 
                $orderBy = 'categories.categoryname';
                break;
        }

        $orderSort = $request->input('order.0.dir');
        
        $data = Categori::query();
        
        if($request->input('search.value')!= null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(categoryname) like ?',['%'.$request->input('search.value').'%']);
            });
        }

        $recordsFiltered = $data->get()->count(); 
        
        if($request->input('length')!= -1)$data = $data->skip($request->input('start'))->take($request->input('length'));
        $data = $data->orderBy($orderBy,  'asc')->get();
        
        $recordsTotal = $data->count(); 
        $data1 = array();
        $no = $request->input('start');
        foreach ($data as $value) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $value->categoryname;
            $row[] = $this->_toggle($value);
            $row[] = $this->_btn_detail($value);
            $row[] = $value->isactivecategories;
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
        $statustoogle = $value->isactivecategories;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="aktifnoncategory(this,'.$value->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="aktifnoncategory(this,'.$value->id.')">';
        }
        return $togle;
    }


    // store category
    public function store(Request $request){
        $request->validate([
            "categoryname" => ['required', 'unique:categories,categoryname'],
            'deskripsi' => ['required'],
        ]);

        $data = [
            "categoryname" => $request->categoryname,
            "slug"  => strtolower(preg_replace('/\s+/', '-', $request->categoryname)),
            'deskripsi' => $request->deskripsi
        ];

        $category   = Categori::create($data);
        return response()->json($category);
    }


    // activenon togle process
    public function activenon(Request $request){

        $categorySelect = Categori::firstWhere('id', $request->idcategory);
        $status = $categorySelect->isactivecategories;
        if ($status=="Active") {
            $categorySelect->update(['isactivecategories'=>'Non Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }else {
            $categorySelect->update(['isactivecategories' => 'Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }

    }

    // edit
    public function edit(Request $request, $id){
            $categorySelect = Categori::find($id);
            return response()->json($categorySelect);
    }
    
    // update
    public function update(Request $request, $id){
        $request->validate([
            "categoryname" => ['required'],
            'deskripsi' => ['required'],
        ]);
        
        $dataCategory = Categori::find($id);
        $dataCategory->update([
            "categoryname" => $request->categoryname,
            "slug"  => strtolower(preg_replace('/\s+/', '-', $request->categoryname)),
            "deskripsi" => $request->deskripsi
        ]);

        return response()->json();
    }
}
