<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Article;
use App\Models\Categori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Dashboard',
            'head'          => 'Dashboard',
            'breadcumb1'    => 'Dashboard',
            'breadcumb2'    => 'Index',
            'dataJumlahUser'    => User::count(),
            'dataJumlahTenagaPendidik'      => User::where('jabatan','Tenaga Pendidik')->count('jabatan'),
            'dataJumlahTenagaKependidikan'  => User::where('jabatan','Tenaga Kependidikan')->count('jabatan'),
            'dataJumlahKategoriArticle'     => Categori::count(),
            'dataJumlahArticle'             => Article::count()
        ];
        // ddd($data);
        return view('adminpanel.pages.dashboard.index', $data);
    }
}
