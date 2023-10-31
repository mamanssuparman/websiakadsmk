<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileuserController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Profile User',
            'head'          => 'Profile User',
            'breadcumb1'    => 'Profile User',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.profileuser.index', $data);
    }
}
