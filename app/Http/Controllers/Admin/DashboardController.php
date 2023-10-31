<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Dashboard',
            'head'          => 'Dashboard',
            'breadcumb1'    => 'Dashboard',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.dashboard.index', $data);
    }
}
