<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
