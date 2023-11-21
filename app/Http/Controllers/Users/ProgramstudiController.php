<?php

namespace App\Http\Controllers\Users;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\Prestasiprodi;
use App\Models\Mapelproduktif;
use App\Models\Pekerjaanproduktif;
use App\Http\Controllers\Controller;

class ProgramstudiController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $cariId= Prodi::where('slug', $slug)->first();
        $data = [
            'title'     => 'SMK Negeri 3 Banjar | Profile',
            'dataProdi' => Prodi::with(['kajur', 'mapelproduktifs', 'prestasiprodis', 'pekerjaanproduktifs'])->where('slug', $slug)->firstOrFail(),
            'dataListPekerjaan'     => Pekerjaanproduktif::where('prodiid', $cariId->id)->get(),
            'dataListMapelAjar'     => Mapelproduktif::where('prodiid', $cariId->id)->get(),
            'dataListPrestasi'      => Prestasiprodi::where('prodiid', $cariId->id)->get(),

        ];
        return view('frontend.pages.programstudi.detailprodi', $data);
    }
}
