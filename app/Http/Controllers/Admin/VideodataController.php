<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galleryvideo;
use Illuminate\Support\Facades\Auth;

class VideodataController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Video',
            'head'          => 'Video',
            'breadcumb1'    => 'Video',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.video.index', $data);
    }

    public function stored(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:galleryvideos,judul',
            'jenis' => 'required',
            'urlvideo' => 'required|unique:galleryvideos,urlvideo'
        ]);

        $dataStored = [
            'usersid' => Auth::id(),
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'urlvideo' => $request->urlvideo
        ];

        $video = Galleryvideo::create($dataStored);
        return response()->json($video);
    }

    public function edit($id)
    {
        $video = Galleryvideo::find($id);
        return response()->json($video);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'jenis' => 'required',
            'urlvideo' => 'required'
        ]);

        $dataVideo = Galleryvideo::find($id);
        $dataVideo->update([
            'usersid' => Auth::id(),
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'urlvideo' => $request->urlvideo
        ]);

        return response()->json();
    }

    public function getDataVideo(Request $request)
    {
        $orderBy = 'galleryvideos.judul';
        if ($request->has('order.3.column')) {
            switch ($request->input('order.3.column')) {
                case '1':
                $orderBy = 'galleryvideos.judul';
                break;
            }
        }

        $searchValue = $request->input('search.value');

        $data = Galleryvideo::where('jenis', 'Video');

        if (!empty($searchValue)) {
            $data = $data->where(function($q) use ($searchValue) {
                $q->whereRaw('LOWER(judul) like ?', ['%' . strtolower($searchValue) . '%']);
            });
        }

        $recordsFiltered = $data->count();

        if ($request->input('length') != -1) {
            $data = $data->orderBy($orderBy, 'asc')
            ->skip($request->input('start'))
            ->take($request->input('length'))
            ->get();
        } else {
            $data = $data->orderBy($orderBy, 'asc')->get();
        }

        $recordsTotal = $recordsFiltered; // Total data setelah filter

        $data1 = array();
        $no = $request->input('start');
        foreach ($data as $x) {
            $no++;
            $row = [];
            $row[] = $no;
            $row[] = $this->_iframe($x);
            $row[] = $this->_toggle($x);
            $row[] = $this->_btn_detail($x);
            $data1[] = $row;
        }

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data1,
        ]);
    }

    private function _btn_detail($x)
    {
        $btn_detail = '<button type="button" data-id="'.$x->id.'" id="detail"
            class="edit px-1 text-white bg-blue-800 rounded-sm "><i class="bi bi-list"></i></button>';
        return $btn_detail;
    }

    private function _iframe($x)
    {
        $html = '<div class="w-40 h-24 overflow-hidden rounded-md">
            <iframe
                class="object-cover w-full h-full transition ease-out rounded-md sm:h-42 hover:scale-105 hover:rounded-none"
                src="'.$x->urlvideo.'" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            </div>';

        return $html;
    }

    private function _toggle($x)
    {
        $statustoogle = $x->isactivegallery;
        if($statustoogle == 'Active'){
            $togle= '<input type="checkbox" id="toggle" checked onclick="activenonvideo(this,'.$x->id.')">';
        } else {
            $togle= '<input type="checkbox" id="toggle" onclick="activenonvideo(this,'.$x->id.')">';
        }
        return $togle;
    }

    public function activenon(Request $request)
    {
        $videoStatus = Galleryvideo::firstWhere('id', $request->idVideo);
        $status = $videoStatus->isactivegallery;
        if ($status == "Active") {
            $videoStatus->update(['isactivegallery' => 'Non Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        } else {
            $videoStatus->update(['isactivegallery' => 'Active']);
            return response()->json([
                'data' => "updated successfully",
                'statuscode' => 200
            ]);
        }
    }
}
