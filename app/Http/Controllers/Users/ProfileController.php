<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function detail(Request $request)
    {
        $data = [
            'title'     => 'SMK Negeri 3 Banjar | Profile'
        ];
        return view('frontend.pages.profile.detailprofile', compact('data'));
    }
}
