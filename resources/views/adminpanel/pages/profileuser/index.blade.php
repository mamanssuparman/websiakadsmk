@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
@endpush
@section('content')
    {{-- notif edit --}}
    <div id="alert-2" class="hidden success items-center p-4 mx-8 mt-4 text-slate-100 bg-yellow-500 rounded-lg "
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            Profile Updated Successfully
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5  text-white rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8  dark:hover:bg-gray-700"
            data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    {{-- end notif --}}

    {{-- notif edit --}}
    <div id="alert-3" class="hidden success items-center p-4 mx-8 mt-4 text-slate-100 bg-yellow-500 rounded-lg "
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            Password changed successfully
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5  text-white rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8  dark:hover:bg-gray-700"
            data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    {{-- end notif --}}

    {{-- notif edit --}}
    <div id="alert-4" class="hidden success items-center p-4 mx-8 mt-4 text-slate-100 bg-red-600 rounded-lg "
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            Password failed to change!
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5  text-white rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8  dark:hover:bg-gray-700"
            data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    {{-- end notif --}}

    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>

        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg mb-4">
        <div class="mb-4 border-b border-gray-200 ">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">Ubah Password</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <form action="#" method="post" enctype="multipart/form-data" id="form-update-profile">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                    <div class="flex flex-row w-full">
                        <div class="flex w-full">
                            <div class="flex flex-col w-full px-4">
                                <div class="text-slate-900">
                                    NUPTK
                                </div>
                                <div class="pb-2">
                                    <input type="text" name="nuptk" id="nuptk"
                                        class="w-full h-8 rounded-md border-slate-300" value="{{ Auth::user()->nuptk }}">
                                </div>
                                <div class="text-slate-900">
                                    NIP
                                </div>
                                <div class="pb-2">
                                    <input type="text" name="nip" id="nip"
                                        class="w-full h-8 rounded-md border-slate-300" value="{{ Auth::user()->nip }}">
                                </div>
                                <div class="text-slate-900">
                                    Nama
                                </div>
                                <div class="pb-2">
                                    <input type="text" name="nama" id="nama"
                                        class="w-full h-8 rounded-md border-slate-300" value="{{ Auth::user()->nama }}">
                                </div>
                                <div class="text-slate-900">
                                    Jenis Kelamin
                                </div>
                                <div class="pb-2">
                                    <select name="selectJenisKelamin" id="selectJenisKelamin"
                                        class="w-full h-8 px-2 py-1 rounded-md border-slate-300 text-slate-600">
                                        <option value="" @if (Auth::user()->jeniskelamin == '') selected @endif>-- Pilih
                                            Jenis Kelamin</option>
                                        <option value="Laki-laki" @if (Auth::user()->jeniskelamin == 'Laki-laki') selected @endif>
                                            Laki-laki</option>
                                        <option value="Perempuan" @if (Auth::user()->jeniskelamin == 'Perempuan') selected @endif>
                                            Perempuan</option>
                                    </select>
                                </div>

                                <div class="text-slate-900">
                                    Alamat
                                </div>
                                <div>
                                    <textarea name="alamat" id="alamat" rows="5" class="w-full rounded-md border-slate-300">{{ Auth::user()->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="flex flex-col w-full px-4">
                                <div class="text-slate-900">
                                    Pendidikan Terakhir
                                </div>
                                <div class="pb-2">
                                    <select name="selectPendidikanTerakhir" id="selectPendidikanTerakhir"
                                        class="w-full h-8 px-2 py-1 rounded-md border-slate-300 text-slate-600">
                                        <option value="" @if (Auth::user()->pendidikanterakhir == '') selected @endif>-- Pilih
                                            Pendidikan Terakhir --</option>
                                        <option value="SMK" @if (Auth::user()->pendidikanterakhir == 'SMK') selected @endif>SMK
                                        </option>
                                        <option value="S1" @if (Auth::user()->pendidikanterakhir == 'S1') selected @endif>S1
                                        </option>
                                        <option value="S2" @if (Auth::user()->pendidikanterakhir == 'S2') selected @endif>S2
                                        </option>
                                        <option value="S3" @if (Auth::user()->pendidikanterakhir == 'S3') selected @endif>S3
                                        </option>
                                        <option value="D3" @if (Auth::user()->pendidikanterakhir == 'D3') selected @endif>D3
                                        </option>
                                        <option value="D4" @if (Auth::user()->pendidikanterakhir == 'D4') selected @endif>D4
                                        </option>
                                    </select>
                                </div>
                                <div class="text-slate-900">
                                    Jabatan
                                </div>
                                <div class="pb-2">
                                    <select name="selectJabatan" id="selectJabatan"
                                        class="w-full h-8 px-2 py-1 rounded-md border-slate-300 text-slate-600">
                                        <option value="" @if (Auth::user()->jabatan == '') selected @endif>-- Pilih
                                            Jabatan --</option>
                                        <option value="Kepala Sekolah" @if (Auth::user()->jabatan == 'Kepala Sekolah') selected @endif>
                                            Kepala Sekolah</option>
                                        <option value="Tenaga Pendidik"
                                            @if (Auth::user()->jabatan == 'Tenaga Pendidik') selected @endif>Tenaga Pendidik</option>
                                        <option value="Tenaga Kependidikan"
                                            @if (Auth::user()->jabatan == 'Tenaga Kependidikan') selected @endif>Tenaga Kependidikan</option>
                                    </select>
                                </div>
                                <div class="text-slate-900">
                                    Tugas Tambahan
                                </div>
                                <div class="pb-2">
                                    <select name="selectTugasTambahan" id="selectTugasTambahan"
                                        class="w-full h-8 px-2 py-1 rounded-md border-slate-300 text-slate-600">
                                        <option value="" @if (Auth::user()->tugastambahan == '') selected @endif>-- Pilih
                                            Tugas Tambahan --</option>
                                        <option value="Wakasek Kurikulum"
                                            @if (Auth::user()->tugastambahan == 'Wakasek Kurikulum') selected @endif>Wakasek Kurikulum</option>
                                        <option value="Wakasek Humas" @if (Auth::user()->tugastambahan == 'Wakasek Humas') selected @endif>
                                            Wakasek Humas</option>
                                        <option value="Wakasek Kesiswaan"
                                            @if (Auth::user()->tugastambahan == 'Wakasek Kesiswaan') selected @endif>Wakasek Kesiswaan</option>
                                        <option value="Wakasek Sarpras"
                                            @if (Auth::user()->tugastambahan == 'Wakasek Sarpras') selected @endif>Wakasek Sarpras</option>
                                    </select>
                                </div>
                                <div>
                                    Foto Profile
                                </div>
                                <div class="pb-2">
                                    <input type="file" name="photos" id="photos"
                                        class="w-full h-8 bg-gray-200 rounded-md" onchange="previewImage(event)"
                                        value="{{ Auth::user()->photos }}">
                                </div>
                                <div>
                                    <img src="{{ asset('/images/' . (Auth::user()->photos ? Auth::user()->photos : 'jk-placeholder-image.jpg')) }}"
                                        alt=""
                                        class="container items-center w-32 border-2 border-dashed rounded-md h-44"
                                        id="preview">
                                </div>
                                <div class="flex flex-row justify-between">
                                    <div></div>
                                    <button type="submit" class="px-4 py-2 text-white bg-blue-700 rounded-md">
                                        <i class="bi bi-database-fill-check"></i> Perbaharui
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="hidden p-4 " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <form action="" method="post" id="form-update-pass">
                    @csrf
                    <div class="flex flex-row w-full">
                        <div class="flex w-full">
                            <div class="flex flex-col w-full">
                                <div class="text-slate-900">
                                    Password Lama
                                </div>
                                <div class="pb-2">
                                    <input type="password" name="pass_old" id="pass_old"
                                        class="w-full h-8 rounded-md border-slate-300">
                                    <small id="old_pass" class="error-messages italic text-yellow-500"></small>
                                </div>
                                <div class="text-slate-900">
                                    Password Baru
                                </div>
                                <div class="pb-2">
                                    <input type="password" name="pass_new" id="pass_new"
                                        class="w-full h-8 rounded-md border-slate-300">
                                    <small id="new_pass" class="error-messages italic text-yellow-500"></small>
                                </div>
                                <div class="text-slate-900">
                                    Cocokan Password
                                </div>
                                <div class="pb-2">
                                    <input type="password" name="confirm_pass" id="confirm_pass"
                                        class="w-full h-8 rounded-md border-slate-300">
                                    <small id="conf_pass" class="error-messages italic text-yellow-500"></small>
                                </div>
                                <div class="flex flex-row justify-between">
                                    <div></div>
                                    <div>
                                        <button type="submit" class="px-4 py-2 text-white bg-blue-700 rounded-md"><i
                                                class="bi bi-database-fill-check"></i> Ubah Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full">

                        </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    </div>
@endsection
@push('jsexternal')
    <script src="/jsadmin/profileuser/update_profile.js"></script>
    <script src="/jsadmin/profileuser/update_pass.js"></script>
@endpush
