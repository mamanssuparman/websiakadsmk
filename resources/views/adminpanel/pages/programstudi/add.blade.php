@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="{{ url('') }}/assetsadmin/js/jquery-3.7.0.js"></script>
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
            <div class="flex">
                <a href="{{ url('admin') }}/prodi" class="px-4 py-2 font-semibold text-white bg-yellow-500 rounded-md"><i class="bi bi-arrow-counterclockwise"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <form action="{{ url('admin') }}/prodi/saveProdi" method="post" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="px-6 py-6 mb-6 border border-dashed rounded-md border-slate-300">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="nama_prodi" class="block mb-2 text-sm font-medium text-gray-900">Nama
                            Prodi</label>
                        <input type="text" id="nama_prodi" name="nama_prodi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="{{ old('nama_prodi') }}">
                        <input type="hidden" name="slug" id="slug">
                        @error('nama_prodi')
                            <small class="italic text-yellow-800">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Logo</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="file_input" type="file" name="logo" required>
                        @error('logo')
                            <small class="italic text-yellow-800">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="singkatan" class="block mb-2 text-sm font-medium text-gray-900">Singkatan</label>
                        <input type="text" id="singkatan" name="singkatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required value="{{ old('singkatan') }}">
                        @error('singkatan')
                            <small class="italic text-yellow-800">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="ketua_jurusan" class="block mb-2 text-sm font-medium text-gray-900">Ketua
                            Jurusan</label>
                        <select id="ketua_jurusan" name="ketua_jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>--Pilih Ketua Jurusan--</option>
                            @foreach ($datakajur as $kajur)
                                <option value="{{ $kajur->id }}">{{ $kajur->nama }} | {{ $kajur->jabatan }}</option>
                            @endforeach
                        </select>
                        @error('ketua_jurusan')
                            <small class="italic text-yellow-800">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <small class="italic text-yellow-800">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="px-6 py-6 mb-6 border border-dashed rounded-md border-slate-300">
                <div class="flex flex-wrap gap-16">
                    <div class="w-full overflow-y-auto sm:w-1/2">
                        <table class="w-full text-left">
                            <thead class="h-12 border-t border-b border-slate-300">
                                <tr>
                                    <th>#</th>
                                    <th>Prestasi</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody class="border-b border-slate-300" id="tb-prestasi">

                            </tbody>
                        </table>
                    </div>
                    <div class="w-full sm:flex-1">
                        <div class="flex">
                            <div class="flex-1">
                                <label for="nama_prestasi" class="block mb-2 text-sm font-medium text-gray-900">Nama Prestasi</label>
                                <input type="text" id="nama_prestasi" name="nama_prestasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <small class="italic text-yellow-800" id="information-nama-prestasi"></small>
                            </div>
                            <div class="pt-7">
                                <button type="button" onclick="addPrestasi()" class="p-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-6 mb-6 border border-dashed rounded-md border-slate-300">
                <div class="flex flex-wrap gap-16">
                    <div class="w-full overflow-y-auto sm:w-1/2">
                        <table class="w-full text-left">
                            <thead class="h-12 border-t border-b border-slate-300">
                                <tr>
                                    <th>#</th>
                                    <th>Pekerjaan</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody class="border-b border-slate-300" id="tb-pekerjaan">

                            </tbody>
                        </table>
                    </div>
                    <div class="w-full sm:flex-1">
                        <div class="flex">
                            <div class="flex-1">
                                <label for="nama_pekerjaan" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Pekerjaan</label>
                                <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <small class="italic text-yellow-800" id="information-pekerjaan"></small>
                            </div>
                            <div class="pt-7">
                                <button type="button" onclick="addPekerjaan()" class="p-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-6 py-6 mb-6 border border-dashed rounded-md border-slate-300">
                <div class="flex flex-wrap gap-16">
                    <div class="w-full overflow-y-auto sm:w-1/2">
                        <table class="w-full text-left">
                            <thead class="h-12 border-t border-b border-slate-300">
                                <tr>
                                    <th>#</th>
                                    <th>Mapel di Pelajari</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody class="border-b border-slate-300" id="tb-mapelajar">

                            </tbody>
                        </table>
                    </div>
                    <div class="w-full sm:flex-1">
                        <div class="flex">
                            <div class="flex-1">
                                <label for="nama_mapel_ajar" class="block mb-2 text-sm font-medium text-gray-900">Mapel di
                                    Pelajari</label>
                                <input type="text" id="nama_mapel_ajar" name="nama_mapel_ajar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <small id="information-mapelajar" class="italic text-yellow-800"></small>
                            </div>
                            <div class="pt-7">
                                <button type="button" onclick="addMapelAjar()" class="p-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"> <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2"><i class="bi bi-database-down"></i> Simpan</button>
            </div>
        </form>
    </div>
@endsection
@push('jsexternal')
    <script src="{{ url('') }}/jsadmin/prodi/add.js">

    </script>
@endpush
