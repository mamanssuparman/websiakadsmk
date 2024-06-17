<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Models\Saranaprasarana;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Sarana extends Controller
{
    public function index(Request $request)
    {
        $dataSarana = Saranaprasarana::where('isactivesarana', 'Active')->latest();
        if(request('search')){
            $dataSarana->where('judul', 'like', '%'.request('search').'%');
        }
        $data = [
            'title'             => 'SMK Negeri 3 Banjar | Sarana',
            'dataSarana'       => $dataSarana->paginate(6)
        ];
        return view('frontend.pages.sarana.index', $data);
    }
}
