<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GtkController extends Controller
{
    public function index(Request $request)
    {
        $dataGtk = User::where('jabatan', '!=', 'Kepala Sekolah')->where('statususers', 'Active')->orderBy('nama', 'asc');
        if(request('search')){
            $dataGtk->where('nama', 'like', '%'.request('search').'%');
        }
        $data = [
            'title'     => 'SMK Negeri 3 Banjar | Profile',
            'dataGtk'   => $dataGtk->paginate(12)
        ];
        return view('frontend.pages.gtk.index', $data);
    }
}
