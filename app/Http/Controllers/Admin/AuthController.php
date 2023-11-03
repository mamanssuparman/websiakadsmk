<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'     => 'S-Panel | Login Page'
        ];
        return view('adminpanel.loginpage', compact('data'));
    }
    public function check(Request $request)
    {
        $credential = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->back();
        }

    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('auth');
    }
}
