<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Settings',
            'head'          => 'Settings',
            'breadcumb1'    => 'Settings',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.settings.index', $data);
    }
    // getDataFirstSettings
    public function getdatasettings(Request $request)
    {
        $data= Settings::first();
        if($data){
            return response()->json([
                'statuscode'    => 200,
                'message'       => 'berhasil mengambil data',
                'data'          => $data
            ]);
        } 
        return response()->json([
            'statuscode'        => 500,
            'message'           => 'Something went wrong'
        ]);
       
    }

    public function stored(Request $request)
    {
        try {
            if($request->photo_kepala != ""){
                $request->validate([
                    'judul_video'       => 'required',
                    'embeded_video'     => 'required',
                    'description_video' => 'required',
                    'photo_kepala'         => 'required|mimes:png,jpg,jpeg',
                    'photo_kepala'      => 'required',
                    'judul_sambutan'    => 'required',
                    'isi_sambutan'      => 'required',
                    'nomor_telepon'     => 'required',
                    'alamat_sekolah'    => 'required',
                    'email_sekolah'     => 'required',
                    'url_map_sekolah'   => 'required'
                ]);
                $file_foto          = $request->file('photo_kepala');
                $ekstensi_foto      = $file_foto->extension();
                $nama_foto          = date('dmyhis').'.'.$ekstensi_foto;
                $file_foto->move(public_path('/images'),$nama_foto);
                $foto = $nama_foto;
            } else {
                $request->validate([
                    'judul_video'       => 'required',
                    'embeded_video'     => 'required',
                    'description_video' => 'required',
                    // 'file_foto'         => 'required|mimes:png,jpg,jpeg',
                    'photo_kepala'      => 'required',
                    'judul_sambutan'    => 'required',
                    'isi_sambutan'      => 'required',
                    'nomor_telepon'     => 'required',
                    'alamat_sekolah'    => 'required',
                    'email_sekolah'     => 'required',
                    'url_map_sekolah'   => 'required'
                ]);
                $foto = 'default.jpg';
            }
            $data_stored = [
                'judulvideoprofile'         => $request->judul_video,
                'urlvideo'                  => $request->embeded_video,
                'descriptionvideo'          => $request->description_video,
                'judulsambutan'             => $request->judul_sambutan,
                'isisambutan'               => $request->isi_sambutan,
                'fotokepalasekolah'         => $foto,
                'noteleponsekolah'          => $request->nomor_telepon,
                'emailsekolah'              => $request->email_sekolah,
                'alamatsekolah'             => $request->alamat_sekolah,
                'mapsekolah'                => $request->url_map_sekolah
            ];
            Settings::truncate();
            Settings::create($data_stored);
            return response()->json([
                'statuscode'        => 200,
                'message'           => 'Data berhasil di simpan'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'statuscode'        => 500,
                'message'           => 'Something went wrong'
            ]);
        }
        
    }

    public function updated(Request $request)
    {
        try {
            $getDataFirst = Settings::first();
            if($request->photo_kepala != ""){
                $request->validate([
                    'judul_video'       => 'required',
                    'embeded_video'     => 'required',
                    'description_video' => 'required',
                    'photo_kepala'         => 'required|mimes:png,jpg,jpeg',
                    'photo_kepala'      => 'required',
                    'judul_sambutan'    => 'required',
                    'isi_sambutan'      => 'required',
                    'nomor_telepon'     => 'required',
                    'alamat_sekolah'    => 'required',
                    'email_sekolah'     => 'required',
                    'url_map_sekolah'   => 'required'
                ]);
                $file_foto          = $request->file('photo_kepala');
                $ekstensi_foto      = $file_foto->extension();
                $nama_foto          = "kepalasekolah-".date('dmyhis').'.'.$ekstensi_foto;
                $file_foto->move(public_path('/images'),$nama_foto);
                $foto = $nama_foto;
            } else {
                $request->validate([
                    'judul_video'       => 'required',
                    'embeded_video'     => 'required',
                    'description_video' => 'required',
                    // 'file_foto'         => 'required|mimes:png,jpg,jpeg',
                    // 'photo_kepala'      => 'required',
                    'judul_sambutan'    => 'required',
                    'isi_sambutan'      => 'required',
                    'nomor_telepon'     => 'required',
                    'alamat_sekolah'    => 'required',
                    'email_sekolah'     => 'required',
                    'url_map_sekolah'   => 'required'
                ]);
                $foto = $getDataFirst->fotokepalasekolah;
            }
            $dataUpdated = [
                'judulvideoprofile'         => $request->judul_video,
                'urlvideo'                  => $request->embeded_video,
                'descriptionvideo'          => $request->description_video,
                'judulsambutan'             => $request->judul_sambutan,
                'isisambutan'               => $request->isi_sambutan,
                'fotokepalasekolah'         => $foto,
                'noteleponsekolah'          => $request->nomor_telepon,
                'emailsekolah'              => $request->email_sekolah,
                'alamatsekolah'             => $request->alamat_sekolah,
                'mapsekolah'                => $request->url_map_sekolah
            ];
            Settings::where('id', $getDataFirst->id)->update($dataUpdated);
            return response()->json([
                'statuscode'        => 200,
                'message'           => 'Data berhasi ldi perbaharui.!'
            ]);
        } catch (Exception $error) {
            return response()->json([
                'statuscode'        => 500,
                'message'           => 'Something went wrong'
            ]);
        }
    }
}
