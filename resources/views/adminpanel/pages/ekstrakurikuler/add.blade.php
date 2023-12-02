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
                <a href="{{ url('admin') }}/ekstrakurikuler" class="px-4 py-2 font-semibold text-white bg-yellow-500 rounded-md"><i class="bi bi-arrow-counterclockwise"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <form action="" method="POST" enctype="multipart/form-data" id="form-ekstrakurikuler">
            @csrf
            <div class="flex flex-wrap gap-3">
                <div class="w-full sm:w-1/2">
                    <div class="mb-5">
                        <label for="namaEskul" class="block">Nama Ekstrakurikuler</label>
                        <input id="namaEskul" name="namaEskul" type="text" class="w-full border rounded-md border-slate-300" value="{{ old('namaEskul') }}">

                            <small small class="italic text-yellow-500" id="errNamaEskul"></small>

                        <input type="hidden" name="slug" id="slug">
                    </div>
                    <div class="mb-5">
                        <label for="sinonim" class="block ">Sinonim</label>
                        <input id="sinonim" name="textSinonim" type="text" class="w-full border rounded-md border-slate-300" value="{{ old('sinonim') }}">

                            <small class="italic text-yellow-500" id="errSinonim"></small>

                    </div>
                    <div class="mb-5">
                        <label for="deskripsi" class="block ">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" type="text" class="w-full p-3 rounded-md border-slate-300" rows="6" {{ old('deskripsi') }}></textarea>

                            <small class="italic text-yellow-500" id="errDeskripsi"></small>

                    </div>
                </div>
                <div class="w-full sm:flex-1">
                    <div class="mb-5">
                        <label for="logo" class="block ">Logo</label>
                        <input id="logo" name="logo" type="file"
                            class="w-full border rounded-md selec border-slate-300">

                                <small class="italic text-yellow-500" id="errLogo"></small>

                    </div>
                    <div class="mb-5">
                        <label for="pembinaEkstra" class="block ">Pembina Ekstra</label>
                        <select id="pembinaEkstra" name="pembinaEkstra"
                            class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                            <option selected value="">--Pilih Pembina Ekstra--</option>
                            @foreach ($pembina as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }} | {{ $data->jabatan }}</option>
                            @endforeach
                        </select>

                         <small class="italic text-yellow-500" id="errPembinaEkstra"></small>

                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <button class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800" type="submit"><i class="bi bi-database-down"></i> Simpan</button>
            </div>
        </form>
    </div>
@endsection
@push('jsexternal')
    <script src="/jsadmin/ekstrakurikuler/add.js"></script>
@endpush
