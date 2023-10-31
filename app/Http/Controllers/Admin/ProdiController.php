<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Program Studi',
            'head'          => 'Program Studi',
            'breadcumb1'    => 'Program Studi',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.programstudi.index', $data);
    }
    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Program Studi',
            'head'          => 'Program Studi',
            'breadcumb1'    => 'Program Studi',
            'breadcumb2'    => 'Add'
        ];
        return view('adminpanel.pages.programstudi.add', $data);
    }
    public function detail(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Program Studi',
            'head'          => 'Program Studi',
            'breadcumb1'    => 'Program Studi',
            'breadcumb2'    => 'Detail and Edit'
        ];
        return view('adminpanel.pages.programstudi.edit', $data);
    }
}
