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
                <a href="{{ url('admin') }}/profile" class="px-4 py-2 text-white bg-yellow-500 rounded-md"><i class="bi bi-arrow-counterclockwise"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="flex flex-row w-full px-6">
            <div class="flex flex-col w-full pb-2">
                <div class="font-semibold text-slate-900">
                    Judul Profile
                </div>
                <div class="pb-2">
                    <input type="text" name="" id="" class="w-full h-8 rounded-md border-slate-300">
                </div>
                <div class="font-semibold text-slate-900">
                    Deskripsi
                </div>
                <div>
                    <textarea name="editor1" id="description" cols="20" rows="10" class="ckeditor"></textarea>
                </div>
            </div>
        </div>
        <div class="flex flex-row justify-between px-6">
            <div></div>
            <div class="px-4 py-2 text-white bg-blue-700 rounded-md">
                <i class="text-white bi bi-database-fill-down"></i> Simpan
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
