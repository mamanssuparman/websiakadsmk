<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticledataController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Article',
            'head'          => 'Article',
            'breadcumb1'    => 'Article',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.article.index', $data);
    }
    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Article',
            'head'          => 'Article',
            'breadcumb1'    => 'Article',
            'breadcumb2'    => 'Add'
        ];
        return view('adminpanel.pages.article.add', $data);
    }
    public function edit(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Article',
            'head'          => 'Article',
            'breadcumb1'    => 'Article',
            'breadcumb2'    => 'Edit'
        ];
        return view('adminpanel.pages.article.edit', $data);
    }
}
