<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use App\Models\Prodi;
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
            'dataArticle'       => Article::with(['categori'])->where('isactivearticle', 'Active')->limit('5')->get(),
            'dataGtk'           => User::where('jabatan','!=','Kepala Sekolah')->get()
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
}
