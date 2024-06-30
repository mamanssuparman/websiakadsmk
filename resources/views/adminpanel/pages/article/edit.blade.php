@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
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
                <a href="{{ url('admin') }}/article" class="px-4 py-2 font-semibold text-white bg-yellow-500 rounded-md"><i class="bi bi-arrow-counterclockwise"></i>Kembali</a>
            </div>

        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <form action="#" method="POST" enctype="multipart/form-data" id="form-update-article">
            @csrf
            <div class="px-4 overflow-y-auto">
                <div class="flex flex-col">
                    <div class="flex text-slate-800">
                        Judul
                    </div>
                    <div>
                        <input type="text" name="judul" id="judul" class="w-full h-8 rounded-md border-slate-300" value="">
                    </div>
                    <div class="mt-2">
                        <div class="text-slate-800">
                            Nama Category
                        </div>
                        <div>
                            <select name="selectcategory" id="selectCategory" class="w-full h-8 px-4 py-1 rounded-md border-slate-300 text-slate-800">
                                <option value="-">-- Pilih Category --</option>
                                @foreach ($datacategory as $category)
                                    <option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="text-slate-800">
                            <img src="" alt="" class="" id="thumbnailheader" style="max-width: 200px">
                        </div>
                        <div class="text-slate-800">
                            Change Header Picture
                        </div>
                        <div>
                            <input type="file" name="headerpicture" id="" class="w-full h-8 rounded-md border-slate-300 bg-slate-200">
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="text-slate-800">
                            Isi Article
                        </div>
                        <div>
                            <textarea name="editor1" id="editor1" cols="20" class="w-full h-64 rounded-md border-slate-300">

                            </textarea>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex flex-row justify-end">
                            <button type="submit" class="px-4 py-2 text-white bg-blue-700 rounded-md"><i class="bi bi-database-down"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('jsexternal')
    <script>
        var storagePath ="{!! asset('storage/images/') !!}";
    </script>
    <script src="{{ url('') }}/jsadmin/article/edit.js">

    </script>
@endpush
