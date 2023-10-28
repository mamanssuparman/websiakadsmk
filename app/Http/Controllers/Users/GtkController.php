<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GtkController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'     => 'SMK Negeri 3 Banjar | Profile'
        ];
        return view('frontend.pages.gtk.index', compact('data'));
    }
}
