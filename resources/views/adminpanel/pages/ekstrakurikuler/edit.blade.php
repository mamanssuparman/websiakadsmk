@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
@endpush
@section('content')
    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>
            <div>
                <a href="{{ url('admin') }}/ekstrakurikuler" class="px-4 py-2 font-semibold text-white bg-yellow-500 rounded-md"><i class="bi bi-arrow-counterclockwise"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <form action="" method="post">
            <div class="flex flex-wrap gap-3">
                <div class="w-full sm:w-1/2">
                    <div class="mb-5">
                        <label for="namaEskul" class="block">Nama Ekstrakurikuler</label>
                        <input id="namaEskul" name="namaEskul" type="number" class="w-full border rounded-md border-slate-300 ">
                    </div>

                    <div class="mb-5">
                        <label  for="deskripsi" class="block ">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="w-full p-3 rounded-md border-slate-300" rows="6"></textarea>
                    </div>
                </div>

                <div class="w-full sm:flex-1">
                    <div class="mb-5">
                        <label for="logo" class="block ">Logo</label>
                        <input id="logo" name="logo" type="file" class="w-full border rounded-md selec border-slate-300">
                    </div>
                    <div class="mb-5">
                        <label for="pendidikanTerakhir"  class="block ">Pembina Ekstra</label>
                        <select id="pendidikanTerakhir" name="pendidikanTerakhir" class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                            <option selected>--Pilih Pembina Ekstra--</option>
                            <option value="--">--</option>
                            <option value="--">--</option>
                            <option value="--">--</option>
                            <option value="--">--</option>

                        </select>
                    </div>


                </div>
            </div>
            <div class="flex justify-end">
                <button class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800"><i class="bi bi-database-down"></i> Simpan</button>
            </div>
        </form>
    </div>
@endsection
