<?php

namespace App\Http\Controllers\Users;

use App\Models\Galleryvideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Pagination\Paginator;

class GalleryController extends Controller
{
    public function foto(Request $request)
    {
        $dataGallery = Galleryvideo::where('jenis', 'Gallery')->latest();
        if(request('search')){
            $dataGallery->where('judul', 'like', '%'.request('search').'%');
        }
        $data = [
            'title'             => 'SMK Negeri 3 Banjar | Profile',
            'dataGallery'       => $dataGallery->paginate(6)
        ];
        return view('frontend.pages.gallery.foto', $data);
    }
    public function video(Request $request)
    {
        $dataGalleryVideo = Galleryvideo::where('jenis', 'Video')->latest();
        if(request('search')){
            $dataGalleryVideo->where('judul', 'like','%'.request('search').'%');
        }
        $data = [
            'title'     => 'SMK Negeri 3 Banjar | Profile',
            'dataVideo' => $dataGalleryVideo->paginate(6)
        ];
        return view('frontend.pages.gallery.video', $data);
    }
}
