<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
