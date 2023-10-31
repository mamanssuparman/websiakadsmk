@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
@endpush
@section('content')
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
        <div class="px-4 overflow-y-auto">
            <div class="flex flex-col">
                <div class="flex text-slate-800">
                    Article
                </div>
                <div>
                    <input type="text" name="" id="" class="w-full h-8 rounded-md border-slate-300">
                </div>
                <div class="mt-2">
                    <div class="text-slate-800">
                        Nama Category
                    </div>
                    <div>
                        <select name="" id="" class="w-full h-8 px-4 rounded-md border-slate-300 text-slate-800">
                            <option value="">-- Pilih Category --</option>

                        </select>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="text-slate-800">
                        Header Picture
                    </div>
                    <div>
                        <input type="file" name="" id="" class="w-full h-8 rounded-md border-slate-300 bg-slate-200">
                    </div>
                </div>
                <div class="mt-2">
                    <div class="text-slate-800">
                        Isi Article
                    </div>
                    <div>
                        <textarea name="editor1" id="" cols="20" class="w-full h-64 rounded-md border-slate-300"></textarea>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="flex flex-row justify-end">
                        <button class="px-4 py-2 text-white bg-blue-700 rounded-md"><i class="bi bi-database-down"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('jsexternal')
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Image',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            clipboard_handleImages: false
        }
        CKEDITOR.replace('editor1', options);
    </script>
@endpush
