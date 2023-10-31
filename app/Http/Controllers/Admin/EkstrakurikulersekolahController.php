<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EkstrakurikulersekolahController extends Controller
{
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
    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Ekstrakurikuler',
            'head'          => 'Ekstrakurikuler',
            'breadcumb1'    => 'Ekstrakurikuler',
            'breadcumb2'    => 'Add'
        ];
        return view('adminpanel.pages.ekstrakurikuler.add', $data);
    }
    public function edit(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Ekstrakurikuler',
            'head'          => 'Ekstrakurikuler',
            'breadcumb1'    => 'Ekstrakurikuler',
            'breadcumb2'    => 'Edit'
        ];
        return view('adminpanel.pages.ekstrakurikuler.edit', $data);
    }
}
