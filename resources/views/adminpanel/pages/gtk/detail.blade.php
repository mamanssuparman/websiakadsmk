@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
    <script src="/assetsadmin/js/jquery.dataTables.min.js"></script>
    <script src="/assetsadmin/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assetsadmin/css/dataTables.tailwindcss.min.css">


@endpush
@section('content')
{{-- start Toast or alert --}}
    <div id="alert-1" class="@if (session('message'))
        {{ 'flex' }}
    @else
        {{ 'hidden' }}
    @endif  items-center p-4 mx-8 mt-4 text-white bg-green-800 rounded-lg " role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            {{ session('message') }}
        </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5  text-white rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8  dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
{{-- End Toast or alert--}}
    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>
            <div>
                <a href="{{ url('admin') }}/gtk" class="px-4 py-2 font-semibold text-white bg-yellow-500 rounded-md"><i
                        class="bi bi-arrow-counterclockwise"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="flex gap-4 mb-4">
            <button type="button" id="btn_profile" class="text-blue-800">Profile</button>
            <button type="button" id="btn_ubahpassword" class="">Ubah Password</button>
        </div>
        <hr class="mb-4 border border-slate-300">
        <div id="profile" class="">
            <form action="" id="form-profile" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="guruid" id="guruid" value="">
                <div class="flex flex-wrap gap-3 mb-4">
                    <div class="w-full sm:w-1/2">
                        <div class="mb-4">
                            <label for="nuptk" class="block">NUPTK</label>
                            <input id="textnuptk" name="nuptk" type="text"
                                class="w-full border rounded-md border-slate-300 " value="{{ old('nuptk') }}">
                                <small class="italic text-yellow-500" id="errNuptk"></small>
                        </div>
                        <div class="mb-4">
                            <label for="nip" class="block">NIP</label>
                            <input id="textnip" name="nip" type="text"
                                class="w-full border rounded-md border-slate-300 " value="{{ old('nip') }}">
                                <small class="italic text-yellow-500" id="errTextNip"></small>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block">Nama</label>
                            <input id="textnama" type="text" class="w-full border rounded-md border-slate-300" name="textnama" value="{{ old('textnama') }}">
                                <small class="italic text-yellow-500" id="errTextNama"></small>
                        </div>
                        <div class="mb-4">
                            <label for="selectjenisKelamin" class="block ">Jenis Kelamin</label>
                            <select id="selectjenisKelamin" name="selectJenisKelamin"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-laki" {{ old('selectJenisKelamin')=="Laki-laki" ? 'selected' : '' }}>Laki Laki</option>
                                <option value="Perempuan" {{ old('selectJenisKelamin')=="Perempuan" ? 'selected' : '' }}>Perempuan</option>
                            </select>
                                <small class="italic text-yellow-500" id="errSelectJenisKelamin"></small>
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="block ">Alamat</label>
                            <textarea id="textalamat" name="textalamat" class="w-full p-3 rounded-md border-slate-300" rows="8">{{ old('textalamat') }}</textarea>
                                <small class="italic text-yellow-500" id="errTextAlamat"></small>
                        </div>
                    </div>
                    <div class="w-full sm:flex-1">
                        <div class="mb-4">
                            <label for="selectpendidikanTerakhir" class="block ">Pendidikan Terakhir</label>
                            <select id="selectpendidikanTerakhir" name="selectpendidikanTerakhir"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Pilih Pendidikan Terakhir--</option>
                                <option value="S1" {{ old('selectpendidikanTerakhir') == "S1" ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ old('selectpendidikanTerakhir') == "S2" ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ old('selectpendidikanTerakhir') == "S3" ? 'selected' : '' }}>S3</option>
                                <option value="D1" {{ old('selectpendidikanTerakhir') == "D1" ? 'selected' : '' }}>D1</option>
                                <option value="D2" {{ old('selectpendidikanTerakhir') == "D2" ? 'selected' : '' }}>D2</option>
                                <option value="D3" {{ old('selectpendidikanTerakhir') == "D3" ? 'selected' : '' }}>D3</option>
                                <option value="SMA" {{ old('selectpendidikanTerakhir') == "SMA" ? 'selected' : '' }}>SMA</option>
                                <option value="SMP" {{ old('selectpendidikanTerakhir') == "SMP" ? 'selected' : '' }}>SMP</option>
                            </select>
                                <small class="italic text-yellow-500" id="errSelectPendidikanTerakhir"></small>
                        </div>
                        <div class="mb-4">
                            <label for="selectjabatan" class="block ">Jabatan</label>
                            <select id="selectjabatan" name="selectjabatan"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Pilih Jabatan--</option>
                                <option value="Tenaga Pendidik" {{ old('selectjabatan') == "Tenaga Pendidik" ? 'selected' : '' }}>Tenaga Pendidik</option>
                                <option value="Kepala Sekolah" {{ old('selectjabatan') == "Kepala Sekolah" ? 'selected' : '' }}>Kepala Sekolah</option>
                                <option value="Tenaga Kependidikan" {{ old('selectjabatan') == "Tenaga Kependidikan" ? 'selected' : '' }}>Tenaga Kependidikan</option>
                            </select>
                                <small class="italic text-yellow-500" id="errSelectJabatan"></small>
                        </div>
                        <div class="mb-4">
                            <label for="selecttugasTambahan" class="block ">Tugas Tambahan</label>
                            <select id="selecttugasTambahan" name="selecttugasTambahan"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Pilih Tugas Tambahan--</option>
                                <option value="Wakasek Kurikulum" {{ old('selecttugasTambahan') == "Wakasek Kurikulum" ? 'selected' : '' }}>Wakasek Kurikulum</option>
                                <option value="Wakasek Humas" {{ old('selecttugasTambahan') == "Wakasek Humas" ? 'selected' : '' }}>Wakasek Humas</option>
                                <option value="Wakasek Kesiswaan" {{ old('selecttugasTambahan') == "Wakasek Kesiswaan" ? 'selected' : '' }}>Wakasek Kesiswaan</option>
                                <option value="Wakasek Sarpras" {{ old('selecttugasTambahan') == "Wakasek Sarpras" ? 'selected' : '' }}>Wakasek Sarpras</option>
                            </select>
                                <small class="italic text-yellow-500" id="errSelectTugasTambahan"></small>
                        </div>
                        <div class="mb-4">
                            <label for="selectrole" class="block ">Role</label>
                            <select id="selectrole" name="selectrole"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">--Pilih Role--</option>
                                <option value="Super Admin" {{ old('selectrole') == "Super Admin" ? 'selected' : '' }}>Super Admin</option>
                                <option value="Admin" {{ old('selectrole') == "Admin" ? 'selected' : '' }}>Admin</option>
                                <option value="User" {{ old('selectrole') == "User" ? 'selected' : '' }}>User</option>
                            </select>
                                <small class="italic text-yellow-500" id="errSelectRole"></small>
                        </div>
                        <div class="mb-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="textEmail" class="w-full border rounded-md border-slate-300" required value="{{ old('email') }}">
                                <small class="italic text-yellow-500" id="errEmail"></small>
                        </div>
                        <div class="mb-4">
                            <label for="fotoProfile" class="block ">Foto Profile</label>
                            <input id="fotoProfile" name="fotoProfile" type="file"
                                class="w-full border rounded-md selec border-slate-300" accept="image/png,image/jpg">
                        </div>
                        <div class="mb5">
                            <img id="images" src="" class="rounded-md" width="120" alt="">
                        </div>
                    </div>
                </div>

                <div class="w-full p-5 border rounded-md border-slate-300">
                    <div class="relative overflow-x-auto sm:rounded-md">
                        <div class="mb-9">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold text-slate-900 ">Mapel Ajar</h3>
                                <button type="button" class="px-4 py-2 text-white bg-green-700 rounded-md" data-modal-target="default-modal" data-modal-toggle="default-modal">Choose Mapel</button>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
                            <thead class="text-xs text-black uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="py-3 text-left">
                                        Mapelsta
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbmapel">

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="flex justify-end mt-3">
                    <button type="submit"
                        class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800"><i
                            class="bi bi-database-down"></i> Update</button>
                </div>
            </form>
        </div>
        <div id="ubah_password" class="hidden">
            <form action="#" method="post" class="sm:w-1/2">
                @csrf
                <div class="mb-5 ">
                    <label for="password" class="block">Password Baru</label>
                    <input id="password" name="password" type="password"
                        class="w-full border rounded-md border-slate-300 ">
                        <small class="hidden italic text-yellow-500" id="information-passwordbaru"></small>
                </div>
                <div class="mb-5">
                    <label for="password" class="block">Konfirmasi Password</label>
                    <input id="cocokan_password" name="cocokan_password" type="password" class="w-full border rounded-md border-slate-300 ">
                    <small class="hidden italic text-yellow-500" id="information-confirmpassword"></small>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="updatePassword()" class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800"><i class="bi bi-database-down" ></i> Update Password</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Start Modal Data Mata Pelajaran --}}
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Data Mata Pelajaran
                    </h3>
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 " data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <table id="tblchoosepelajaran" class="w-full bg-white border rounded-md display border-slate-300">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produktif RPL</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b ">
                    <div class="flex items-center justify-between">
                        {{-- <h3 class="font-semibold text-slate-900 ">Mapel Ajar</h3> --}}
                        <button type="button" class="px-4 py-1 text-white bg-green-700 rounded-md" data-modal-target="default-modal" data-modal-toggle="default-modal"><i class="bi bi-check"></i> Selesai</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Data Mata Pelajaran --}}
@endsection
@push('jsexternal')
    <script src="/jsadmin/gtk/detail.js">


    </script>

@endpush
