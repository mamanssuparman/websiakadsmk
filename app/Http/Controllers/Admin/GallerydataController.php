<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GallerydataController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Gallery',
            'head'          => 'Gallery',
            'breadcumb1'    => 'Gallery',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.gallery.index', $data);
    }
}
