@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
<script src="/assetsadmin/js/jquery-3.7.0.js"></script>
@endpush
@section('content')
{{-- start Toast or alert --}}
<div id="alert-1" class="@if (session('success'))
    {{ 'flex' }}
    @else
    {{ 'hidden' }}
    @endif  items-center p-4 mx-8 mt-4 text-white bg-green-800 rounded-lg " role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium">
        {{ session('success') }}
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
                <a href="{{ url('admin') }}/gtk" class="px-4 py-2 font-semibold text-white bg-yellow-500 rounded-md"><i class="bi bi-arrow-counterclockwise"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <form action="" method="post" enctype="multipart/form-data" id="form-add-gtk">
            @csrf
            <div class="flex flex-wrap gap-3">
                <div class="w-full sm:w-1/2">
                    <div class="mb-5">
                        <label for="nuptk" class="block">NUPTK</label>
                        <input id="nuptk" name="nuptk" type="text"
                            class="w-full border rounded-md border-slate-300 " required value="{{ old('nuptk') }}">
                                <small class="italic text-yellow-500" id="errNuptk"></small>
                    </div>
                    <div class="mb-5">
                        <label for="nip" class="block">NIP</label>
                        <input id="nip" name="nip" type="text"
                            class="w-full border rounded-md border-slate-300 " required value="{{ old('nip') }}">
                                <small class="italic text-yellow-500" id="errNip"></small>
                    </div>
                    <div class="mb-5">
                        <label for="nama" class="block">Nama</label>
                        <input id="nama" name="textNama" type="text" class="w-full border rounded-md border-slate-300" required value="{{ old('textNama') }}">
                                <small class="italic text-yellow-500" id="errTextNama"></small>
                    </div>
                    <div class="mb-5">
                        <label for="jenisKelamin" class="block ">Jenis Kelamin</label>
                        <select id="jenisKelamin" name="selectJenisKelamin"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="-">--Pilih Jenis Kelamin--</option>
                            <option value="Laki-laki" {{ old('selectJenisKelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki Laki</option>
                            <option value="Perempuan" {{ old('selectJenisKelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                                <small class="italic text-yellow-500" id="errSelectJenisKelamin"></small>
                    </div>
                    <div class="mb-5">
                        <label for="alamat" class="block ">Alamat</label>
                        <textarea id="alamat" name="textAlamat" class="w-full p-3 rounded-md border-slate-300" rows="6"></textarea>
                                <small class="italic text-yellow-500" id="errTextAlamat"></small>
                    </div>
                </div>
                <div class="w-full sm:flex-1">
                    <div class="mb-5">
                        <label for="pendidikanTerakhir" class="block ">Pendidikan Terakhir</label>
                        <select id="pendidikanTerakhir" name="selectPendidikanTerakhir"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="-">--Pilih Pendidikan Terakhir--</option>
                            <option value="S1" {{ old('selectPendidikanTerakhir') == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ old('selectPendidikanTerakhir') == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ old('selectPendidikanTerakhir') == 'S3' ? 'selected' : '' }}>S3</option>
                            <option value="D1" {{ old('selectPendidikanTerakhir') == 'D1' ? 'selected' : '' }}>D1</option>
                            <option value="D2" {{ old('selectPendidikanTerakhir') == 'D2' ? 'selected' : '' }}>D2</option>
                            <option value="D3" {{ old('selectPendidikanTerakhir') == 'D3' ? 'selected' : '' }}>D3</option>
                            <option value="SMA" {{ old('selectPendidikanTerakhir') == 'SMA' ? 'selected' : '' }}>SMA</option>
                            <option value="SMP" {{ old('selectPendidikanTerakhir') == 'SMP' ? 'selected' : '' }}>SMP</option>
                        </select>
                                <small class="italic text-yellow-500" id="errSelectPendidikanTerakhir"></small>
                    </div>
                    <div class="mb-5">
                        <label for="jabatan" class="block ">Jabatan</label>
                        <select id="jabatan" name="selectJabatan"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="-">--Pilih Jabatan--</option>
                                <option value="Tenaga Pendidik" {{ old('selectJabatan') == 'Tenaga Pendidik' ? 'selected' : '' }}>Tenaga Pendidik</option>
                                <option value="Tenaga Kependidikan" {{ old('selectJabatan') == 'Tenaga Kependidikan' ? 'selected' : '' }}>Tenaga Kependidikan</option>
                        </select>
                                <small class="italic text-yellow-500" id="errSelectJabatan"></small>
                    </div>
                    <div class="mb-5">
                        <label for="tugasTambahan" class="block ">Tugas Tambahan</label>
                        <select id="tugasTambahan" name="selectTugasTambahan"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500" >
                                <option value="">--Pilih Tugas Tambahan--</option>
                                <option value="Wakasek Kurikulum" {{ old('selectTugasTambahan') == 'Wakasek Kurikulum' ? 'selected' : '' }}>Wakasek Kurikulum</option>
                                <option value="Wakasek Humas" {{ old('selectTugasTambahan') == 'Wakasek Humas' ? 'selected' : '' }}>Wakasek Humas</option>
                                <option value="Wakasek Kesiswaan" {{ old('selectTugasTambahan') == 'Wakasek Kesiswaan' ? 'selected' : '' }}>Wakasek Kesiswaan</option>
                                <option value="Wakasek Sarpras" {{ old('selectTugasTambahan') == 'Wakasek Sarpras' ? 'selected' : '' }}>Wakasek Sarpras</option>
                        </select>
                                <small class="italic text-yellow-500" id="errSelectTugasTambahan"></small>
                    </div>
                    <div class="mb-5">
                        <label for="role" class="block ">Role</label>
                        <select id="role" name="selectRole"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">--Pilih Role--</option>
                                <option value="Super Admin" {{ old('selectRole') == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                                <option value="Admin" {{ old('selectRole') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="User" {{ old('selectRole') == 'User' ? 'selected' : '' }}>User</option>
                        </select>
                                <small class="italic text-yellow-500" id="errSelectRole"></small>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block">Email</label>
                        <input id="email" name="textemail" type="email" class="w-full border rounded-md border-slate-300 " required value="{{ old('textemail') }}">
                                <small class="italic text-yellow-500" id="errTextEmail"></small>
                    </div>
                    <div class="mb-5">
                        <label for="fotoProfile" class="block ">Foto Profile</label>
                        <input id="fotoProfile" name="fotoProfile" type="file"
                            class="w-full border rounded-md selec border-slate-300" accept="image/png,image/jpg" onchange="previewImage(event)" id="fotoProfile">
                            <small class="italic text-yellow-500" id="errFotoProfile"></small>
                    </div>
                    <div class="mb-5">
                        <img src="" alt="" id="img-preview" width="200" class="rounded-md">
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-2">
                <button class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800"><i class="bi bi-database-down"></i> Simpan</button>
            </div>
        </form>

    </div>
@endsection
@push('jsexternal')
    <script src="{{ url('') }}/jsadmin/gtk/add.js">

    </script>
@endpush
