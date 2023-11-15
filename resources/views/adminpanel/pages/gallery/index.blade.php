@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
    <script src="/assetsadmin/js/jquery.dataTables.min.js"></script>
    <script src="/assetsadmin/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assetsadmin/css/dataTables.tailwindcss.min.css">
    <style>
        #toggle {
            position: absolute;
            width: 30px;
            height: 20px;
            background-color: rgb(175, 26, 26);
            /* -webkit-appearance: none; */
            outline: none;
            box-shadow: 0 2px 7px #fff;
            border-radius: 20px;
            transition: background 0.9s;
        }

        #toggle:checked {
            background-color: rgb(17, 126, 84);
        }

        #toggle::before {
            content: '';
            position: absolute;
            top: 2.3px;
            left: 2px;
            background-color: #fff;
            border-radius: 50%;
            width: 15px;
            height: 15px;
            transition: 0.5s;
        }

        #toggle:checked::before {
            left: 13px;
        }
    </style>
@endpush
@section('content')
    {{-- notif add--}}
    <div id="alert-1" class="items-center hidden p-4 mx-8 mt-4 text-white bg-green-800 rounded-lg success " role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            Add Category Artcile Successfully
        </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5  text-white rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8  dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    {{-- end notif --}}
    {{-- notif edit--}}
    <div id="alert-2" class="items-center hidden p-4 mx-8 mt-4 bg-yellow-500 rounded-lg success text-slate-100 " role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            Edit Category Artcile Successfully
        </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5  text-white rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8  dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    {{-- end notif --}}

    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>

        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="flex flex-wrap gap-16 mt-5">
            <div class="w-full overflow-hidden overflow-y-auto sm:w-1/2">
                <table id="example2" class="w-full display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="w-full p-12 border rounded-md border-slate-300 sm:flex-1">
                <form id="form-gallery" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idGallery" id="idGallery">
                    <div class="mb-6">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul Foto</label>
                        <input type="text" id="judul" name="judul"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-8">
                        <small id="judulError" class="italic text-yellow-500 error-messages"></small>
                    </div>
                    <div class="mb-6">
                        <label for="jenis" class="block">Jenis</label>
                        <select name="jenis" id="jenis"
                            class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected value="">--Pilih Jenis Media--</option>
                            <option value="Gallery">Gallery</option>
                            <option value="Video" disabled>Video</option>
                        </select>
                        <small id="jenisError" class="italic text-yellow-500 error-messages"></small>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Foto</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="file_input" type="file" onchange="previewImage(event)" name="foto">
                        <small id="fotoError" class="italic text-yellow-500 error-messages"></small>
                    </div>
                    <div class="mb-6 rounded-md border-slate-300">
                        <img src="" alt="" width="200" class="rounded-md"
                            id="preview">
                    </div>
                    <div class="mb-6 rounded-md border-slate-300">
                        <img src="" alt="" width="200" class="rounded-md"
                            id="preview-edit">
                    </div>
                    <div class="flex justify-end mt-9">
                        <button id='btn-add-edit' class='px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800'><i class='bi bi-plus'></i>Add Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('jsexternal')
    <script src="/jsadmin/gallery/index.js"></script>
@endpush
