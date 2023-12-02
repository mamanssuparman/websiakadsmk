<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Ekstra;
use App\Models\Categori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Cviebrock\EloquentSluggable\Services\SlugService;

class EkstrakurikulersekolahController extends Controller
{
    // view index
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Ekstrakurikuler',
            'head'          => 'Ekstrakurikuler',
            'breadcumb1'    => 'Ekstrakurikuler',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.ekstrakurikuler.index', $data);
    }

    // get data ekstrakulikuler
    public function getEkstrakulikuler(Request $request)
    {
        $orderBy = 'ekstras.judul';

        switch ($request->input('order.3.column')) {
            case '1':
                $orderBy = 'ekstras.judul';
                break;
        }

        $orderSort = $request->input('order.0.dir');

        $data = Ekstra::query()->with('pembina');

        if($request->input('search.value')!= null){
            $data = $data->where(function($q)use($request){
                $q->whereRaw('LOWER(judul) like ?',['%'.$request->input('search.value').'%']);
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
            $row[] = $value->judul;
            $row[] = $value->pembina->nama;
            $row[] = $this->_toggle($value);
            $row[] = $this->_btn_detail($value).' '.$this->_views_detail($value);
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
        $btn_view = '<a href="'.url('admin').'/ekstrakurikuler/views/'.base64_encode($x->id).'" class="px-1 text-white bg-green-600 rounded-sm"><i class="bi bi-eye-fill"></i></a>';
        return $btn_view;
    }
      // button detail
      private function _btn_detail($value)
      {
        $btn_detail = '<a href="'.url('admin/ekstrakurikuler/edit/'.base64_encode($value->id)).'" class="px-1 text-white bg-blue-800 rounded-sm "><i class="bi bi-list"></i></a>';
          return $btn_detail;
      }
      // toggle active non active
      private function _toggle($value)
      {
          $statustoogle = $value->isactiveekstra;
          if($statustoogle == 'Active'){
              $togle= '<input type="checkbox" id="toggle" checked onclick="aktifnonekstra(this,'.$value->id.')">';
          } else {
              $togle= '<input type="checkbox" id="toggle" onclick="aktifnonekstra(this,'.$value->id.')">';
          }
          return $togle;
      }


    // activenon togle process
    public function activenon(Request $request){

        $categorySelect = Ekstra::firstWhere('id', $request->idekstra);
        $status = $categorySelect->isactiveekstra;
        if ($status=="Active") {
            $categorySelect->update(['isactiveekstra'=>'Non Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }else {
            $categorySelect->update(['isactiveekstra' => 'Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }

    }


    // add view
    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Ekstrakurikuler',
            'head'          => 'Ekstrakurikuler',
            'breadcumb1'    => 'Ekstrakurikuler',
            'breadcumb2'    => 'Add',
            "pembina"       => User::all()
        ];
        return view('adminpanel.pages.ekstrakurikuler.add', $data);
    }


    // store process
    public function store(Request $request)
    {
        try {
            $request->validate([
                "namaEskul"         => ['required', 'unique:ekstras,judul'],
                "deskripsi"         => ['required'],
                "pembinaEkstra"     => ['required'],
                "textSinonim"       => ['required']
            ]);
            $gambar = "default.jpg";
            if ($request->hasFile('logo')) {
                $request->validate([
                    "logo"  => ['mimes:png,jpg,webp,pdf,png,jpeg, gif'],
                ]);

                $file_gambar        = $request->file('logo');
                $ekstensi_gambar    = $file_gambar->extension();
                $nama_gambar        = 'ekstra-'.date('dmyhis').'.'.$ekstensi_gambar;
                $file_gambar->move(public_path('/images'), $nama_gambar);
                $gambar = $nama_gambar;
            }
            $data_ekstra = [
                "pembinaid"         =>  $request->pembinaEkstra,
                "sinonim"           => $request->textSinonim,
                "judul"             =>  $request->namaEskul,
                'slug'              => $request->slug,
                "headerpicture"     =>  $gambar,
                "description"       =>  $request->deskripsi,
            ];
            Ekstra::create($data_ekstra);
            return response()->json($request->session()->flash('success','Data Ekstra berhasil di simpan.!'), 200);
        } catch (Excetion $error) {
            return response()->json($request->session()->flash('success', 'Gagal menyimpan data'), 500);
        }
    }

    // slug
    public function checkslug(Request $request){
        $slug = SlugService::createSlug(Ekstra::class, 'slug', $request->judul);
        return response()->json([
            'slug'      => $slug
        ]);
    }


    // edit view
    public function edit(Request $request, $id)
    {
        $id = base64_decode($id);
        $data = [
            'title'         => 'S-Panel | Ekstrakurikuler',
            'head'          => 'Ekstrakurikuler',
            'breadcumb1'    => 'Ekstrakurikuler',
            'breadcumb2'    => 'Edit',
            'ekstradata'    => Ekstra::where('id', $id)->firstOrFail(),
            'datapembimbing'=> User::all(),
         ];

        return view('adminpanel.pages.ekstrakurikuler.edit', $data);
    }

    // edit process
    public function update(Request $request, $id) {
        try {
            $request->validate([
                "namaEskul"         => ['required'],
                "deskripsi"         => ['required'],
                "pembinaEkstra"     => ['required'],
                "textSinonim"       => ['required']
            ]);
            $data_ekstra = [
                "pembinaid"         =>  $request->pembinaEkstra,
                "judul"             =>  $request->namaEskul,
                "sinonim"           =>  $request->textSinonim,
                "description"       =>  $request->deskripsi,
            ];
            $ekstra = Ekstra::where('id', $id)->firstOrFail();

            if ($request->hasFile('logo')) {
                $request->validate([
                    "logo"  => ['mimes:png,jpg,webp,pdf,png,jpeg, gif'],
                ]);

                $file_gambar        = $request->file('logo');
                $ekstensi_gambar    = $file_gambar->extension();
                $nama_gambar        = 'ekstra-'.date('dmyhis').'.'.$ekstensi_gambar;
                $file_gambar->move(public_path('/images'), $nama_gambar);

                $data_ekstra['headerpicture'] = $nama_gambar;
                // Hapus foto lama
                File::delete(public_path('images'.'/'.$ekstra->headerpicture));
            }

            Ekstra::where('id', $id)->update($data_ekstra);
            return response()->json([
                'message'       => $request->session()->flash('success', 'Data berhasil di perbaharui.!')
            ], 200);

        } catch (Exception $error) {
            return response()->json([
                'message'       => $request->session()->flash('success', 'Data gagal di perbaharui.!')
            ], 500, $headers);
        }
    }

    public function views(Request $request, $id)
    {
        $data = [
            'title'         => 'S-Panel | Ekstrakurikuler',
            'head'          => 'Ekstrakurikuler',
            'breadcumb1'    => 'Ekstrakurikuler',
            'breadcumb2'    => 'Views Detail',
            'dataEkstra'    => Ekstra::with(['pembina'])->where('id', base64_decode($id))->first()
        ];
        return view('adminpanel.pages.ekstrakurikuler.views', $data);
    }
    public function getData(Request $request, $id)
    {
        $dataJson = Ekstra::where('id', $id)->firstOrFail();
        if($dataJson){
            return response()->json([
                'data'      => $dataJson,
                'message'   => 'Berhasil mengambil data'
            ], 200);
        }
    }
}
