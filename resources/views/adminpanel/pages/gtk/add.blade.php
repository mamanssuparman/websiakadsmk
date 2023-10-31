@extends('adminpanel.layouts.layoutadmin')

@section('content')
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
        <form action="" method="post">
            <div class="flex flex-wrap gap-3">
                <div class="w-full sm:w-1/2">
                    <div class="mb-5">
                        <label for="nuptk" class="block">NUPTK</label>
                        <input id="nuptk" name="nuptk" type="number"
                            class="w-full border rounded-md border-slate-300 ">
                    </div>
                    <div class="mb-5">
                        <label for="nip" class="block">NIP</label>
                        <input id="nip" name="nip" type="number"
                            class="w-full border rounded-md border-slate-300 ">
                    </div>
                    <div class="mb-5">
                        <label for="nama" class="block">Nama</label>
                        <input id="nama" type="text" class="w-full border rounded-md border-slate-300">
                    </div>
                    <div class="mb-5">
                        <label for="jenisKelamin" class="block ">Jenis Kelamin</label>
                        <select id="jenisKelamin" name="jenisKelamin"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                            <option selected>--Pilih Jenis Kelamin--</option>
                            <option value="L">Laki Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="alamat" class="block ">Alamat</label>
                        <textarea id="alamat" name="alamat" class="w-full p-3 rounded-md border-slate-300" rows="6"></textarea>
                    </div>
                </div>
                <div class="w-full sm:flex-1">
                    <div class="mb-5">
                        <label for="pendidikanTerakhir" class="block ">Pendidikan Terakhir</label>
                        <select id="pendidikanTerakhir" name="pendidikanTerakhir"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                            <option selected>--Pilih Pendidikan Terakhir--</option>
                            <option value="s1">S1</option>
                            <option value="s2">S2</option>
                            <option value="s3">S3</option>
                            <option value="d1">D1</option>
                            <option value="d2">D2</option>
                            <option value="d3">D3</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="jabatan" class="block ">Jabatan</label>
                        <select id="jabatan" name="jabatan"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                            <option selected>--Pilih Jabatan--</option>
                            <option value="guru">Guru</option>
                            <option value="kepalaSekolah">Kepala Sekolah</option>
                            <option value="tenagaKependidikan">Tenaga Kependidikan</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="tugasTambahan" class="block ">Tugas Tambahan</label>
                        <select id="tugasTambahan" name="tugasTambahan"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                            <option selected>--Pilih Tugas Tambahan--</option>
                            <option value="">--</option>
                            <option value="">--</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="role" class="block ">Role</label>
                        <select id="role" name="role"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                            <option selected>--Pilih Role--</option>
                            <option value="guru">Guru</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="fotoProfile" class="block ">Foto Profile</label>
                        <input id="fotoProfile" name="fotoProfile" type="file"
                            class="w-full border rounded-md selec border-slate-300">
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-2">
                <button class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800"><i
                        class="bi bi-database-down"></i> Simpan</button>
            </div>
        </form>

    </div>
@endsection
