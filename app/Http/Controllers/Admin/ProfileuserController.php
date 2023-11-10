<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileuserController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title'         => 'S-Panel | Profile User',
            'head'          => 'Profile User',
            'breadcumb1'    => 'Profile User',
            'breadcumb2'    => 'Index'
        ];
        return view('adminpanel.pages.profileuser.index', $data);
    }

    public function update_profile_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photos' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = Auth::user();

        $user->nuptk = $request->nuptk;
        $user->nip = $request->nip;
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->jeniskelamin = $request->selectJenisKelamin;
        $user->pendidikanterakhir = $request->selectPendidikanTerakhir;
        $user->jabatan = $request->selectJabatan;
        $user->tugastambahan = $request->selectTugasTambahan;

        if ($request->hasFile('photos')) {
            $previousPhotoPath = public_path('profile_photos/' . $user->photos);
            if (file_exists($previousPhotoPath)) {
                unlink($previousPhotoPath);
            }
            $timestamp = Carbon::now()->timestamp;
            $photoExtension = $request->file('photos')->extension();
            $photoName = $user->id . '_profile_photo_' . $timestamp . '.' . $photoExtension;
            $request->file('photos')->move(public_path('profile_photos'), $photoName);
            $user->photos = $photoName;
        }


        $user->save();
        return response()->json(['user' => $user]);
    }

    public function update_pass(Request $request)
    {
        $request->validate([
            'pass_old' => 'required',
            'pass_new' => 'required|min:8',
            'confirm_pass' => 'required|same:pass_new',
        ]);

        $user = Auth::user();

        if (Hash::check($request->pass_old, $user->password)) {

            $user->password = Hash::make($request->pass_new);
            $user->save();

            return response()->json();
        } else {
            return response()->json();
        }
    }
}
