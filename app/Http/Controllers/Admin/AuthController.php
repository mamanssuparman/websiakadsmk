<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'     => 'S-Panel | Login Page'
        ];
        return view('adminpanel.loginpage', compact('data'));
    }
}