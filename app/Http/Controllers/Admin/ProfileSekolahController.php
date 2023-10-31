<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Profile',
            'head'          => 'Profile',
            'breadcumb1'    => 'Profile',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.profile.index', $data);
    }

    public function add(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Profile',
            'head'          => 'Profile',
            'breadcumb1'    => 'Profile',
            'breadcumb2'    => 'Add'
        ];
        return view('adminpanel.pages.profile.add', $data);
    }
    public function edit(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Profile',
            'head'          => 'Profile',
            'breadcumb1'    => 'Profile',
            'breadcumb2'    => 'Edit'
        ];
        return view('adminpanel.pages.profile.edit', $data);
    }
}
