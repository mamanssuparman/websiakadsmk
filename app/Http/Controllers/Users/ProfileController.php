<?php

namespace App\Http\Controllers\Users;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $data = [
            'title'     => 'SMK Negeri 3 Banjar | Profile',
            'dataProfile'   => Profile::where('slug', $slug)->firstOrFail()
        ];
        return view('frontend.pages.profile.detailprofile', $data);
    }
}
