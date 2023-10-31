<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryarticleController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Category Article',
            'head'          => 'Category Article',
            'breadcumb1'    => 'Category Article',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.categoryarticle.index', $data);
    }
}
