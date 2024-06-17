<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Prodi;
use App\Models\Banner;
use App\Models\Ekstra;
use App\Models\Article;
use App\Models\Profile;
use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $dataParsing = [
            'title'     => 'Home | SMK Negeri 3 Banjar',
            'navigation'        => "Home",
            'dataMenuProfile'   => Profile::where('isactiveprofile','!=','Non Active')->get(),
            'dataArticle'       => Article::with(['categori'])->where('isactivearticle', 'Active')->limit('5')->orderBy('created_at', 'desc')->get(),
            // 'dataGtk'           => User::where('jabatan','!=','Kepala Sekolah')->limit('10')->orderBy('nama', 'ASC')->get(),
            'dataCarousel'      => Banner::where('statusbanner', 'Active')->limit(5)->get(),
            // 'dataKompetensiKeahlian'    => Prodi::where('isactiveprodi', 'Active')->get(),
            'dataMitra'                 => Mitra::where('statusmitra','Active')->get()
        ];
        return view('frontend.index', $dataParsing);
    }
    public function getDataFooter(Request $request)
    {
        // Get data Master Home
        $data = Settings::first();
        if($data){
            $jsonData = [
                'statuscode'    => 200,
                'message'       => 'berhasil mengambil data',
                'data'          => $data
            ];
        } else {
            $jsonData = [
                'statuscode'    => 500,
                'message'       => 'Something went wrong',
                'data'          => null
            ];
        }
        // Get Data menu Profile
        $dataMenuProfile = Profile::where('isactiveprofile', '!=', 'Non Active')->get();
        if($dataMenuProfile){
            $jsonMenuProfile = [
                'statuscode'    => 200,
                'message'       => 'berhasil mengambil data',
                'data'          => $dataMenuProfile
            ];
        } else {
            $jsonMenuProfile = [
                'statuscode'    => 500,
                'message'       => 'Something went wrong',
                'data'          => null
            ];
        }
        // Get Data Menu Prodi
        $dataMenuProdi = Prodi::where('isactiveprodi', '!=', 'Non Active')->get();
        if($dataMenuProdi){
            $jsonMenuProdi = [
                'statuscode'        => 200,
                'message'           => 'berhasil mengambil data',
                'data'              => $dataMenuProdi
            ];
        } else {
            $jsonMenuProdi = [
                'statuscode'        => 500,
                'message'           => 'something went wrong',
                'data'              => null
            ];
        }
        // Get Data Menu Ekstra
        $dataMenuEkstra     = Ekstra::where('isactiveekstra', '!=', 'Non Active')->get();
        if($dataMenuEkstra){
            $jsonMenuEkstra = [
                'statuscode'        => 200,
                'message'           => 'berhasil mengambil data',
                'data'              => $dataMenuEkstra
            ];
        } else {
            $jsonMenuEkstra = [
                'statuscode'        => 500,
                'message'           => 'something went wrong',
                'data'              => null
            ];
        }
        return response()->json([
            'data'      => [
                'master'        => $jsonData,
                'menuProfile'   => $jsonMenuProfile,
                'menuProdi'     => $jsonMenuProdi,
                'menuEkstra'    => $jsonMenuEkstra
            ]
            ]);

    }
    public function getDataJsonGuru(Request $request)
    {
        try {
            $dataJson = User::where('jabatan', '!=', 'Kepala Sekolah')->limit('10')->orderBy('nama', 'ASC')->get();
            return response()->json([
                'dataJsonGuru'      => $dataJson,
                'message'           => 'berhasil mengambil data gtk',
                'status'            => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'dataJsonGuru'      => null,
                'message'           => 'Something went wrong',
                'status'            => 500
            ]);
        }
    }
    public function getDataKompetensi(Request $request)
    {
        try {
            $dataJSON = Prodi::where('isactiveprodi', 'Active')->get();
            return response()->json([
                'dataJsonProdi'     => $dataJSON,
                'message'           => 'berhasil mengambil data',
                'status'            => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'dataJsonProdi'     => null,
                'message'           => 'Something went wrong',
                'status'            => 500
            ]);
        }
    }
    public function getDataMitra(Request $request)
    {
        try {
            $dataJsonMitra = Mitra::where('statusmitra','Active')->get();
            return response()->json([
                'dataJsonMitra'     => $dataJsonMitra,
                'message'           => 'berhasil mengambil data',
                'status'            => 200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'dataJsonMitra'     => null,
                'message'           => 'something went wrong',
                'status'            => 500
            ]);
        }
    }
}
