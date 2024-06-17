<?php

namespace App\Http\Controllers\Users;

use App\Models\Ekstra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EkstrakurikulerController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $data = [
            'title'     => 'SMK Negeri 3 Banjar | Profile',
            'dataEkstra'    => Ekstra::with(['pembina'])->where('slug', $slug)->firstOrFail()
        ];
        return view('frontend.pages.ekstrakurikuler.detail', $data);
    }
}
