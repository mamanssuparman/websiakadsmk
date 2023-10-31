<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GtkDataController extends Controller
{
    public function index(Request $request )
    {
        $data = [
            'title'         => 'S-Panel | GTK',
            'head'          => 'GTK',
            'breadcumb1'    => 'GTK',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.gtk.index', $data);
    }
    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | GTK',
            'head'          => 'GTK',
            'breadcumb1'    => 'GTK',
            'breadcumb2'    => 'Add'
        ];
        return view('adminpanel.pages.gtk.add', $data);
    }
    public function detail(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | GTK',
            'head'          => 'GTK',
            'breadcumb1'    => 'GTK',
            'breadcumb2'    => 'Detail'
        ];
        return view('adminpanel.pages.gtk.detail', $data);
    }
}
