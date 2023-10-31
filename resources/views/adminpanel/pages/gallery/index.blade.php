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
                <table id="example" class="w-full display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="/images/ki-1.jpg" alt="foto" width="200" class="rounded-md"></td>
                            <td>
                                <input type="checkbox" title="Dead Part" id="toggle" checked class="">
                            </td>
                            <td>
                                <i class="px-2 py-1 text-white bg-blue-700 rounded-md bi bi-list"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><img src="/images/ki-1.jpg" alt="foto" width="200" class="rounded-md"></td>
                            <td>
                                <input type="checkbox" title="Dead Part" id="toggle" class="">
                            </td>
                            <td>
                                <i class="px-2 py-1 text-white bg-blue-700 rounded-md bi bi-list"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><img src="/images/ki-1.jpg" alt="foto" width="200" class="rounded-md"></td>
                            <td>
                                <input type="checkbox" title="Dead Part" id="toggle" class="">
                            </td>
                            <td>
                                <i class="px-2 py-1 text-white bg-blue-700 rounded-md bi bi-list"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><img src="/images/ki-1.jpg" alt="foto" width="200" class="rounded-md"></td>
                            <td>
                                <input type="checkbox" title="Dead Part" id="toggle" class="">
                            </td>
                            <td>
                                <i class="px-2 py-1 text-white bg-blue-700 rounded-md bi bi-list"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-full p-12 border rounded-md border-slate-300 sm:flex-1">
                <form action="#" method="post">
                    <div class="mb-6">
                        <label for="judul" class="block mb-2 text-sm font-medium text-gray-900">Judul Foto</label>
                        <input type="text" id="judul" name="judul"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 h-8"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi /
                            Keterangan</label>
                        <textarea id="deskripsi" rows="4" name="deskripsi"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Foto</label>
                        <input
                            class="block w-full h-8 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="file_input" type="file" onchange="previewImage(event)" name="foto">
                    </div>
                    <div class="mb-6 rounded-md border-slate-300">
                        <img src="../dist/image/jk-placeholder-image.jpg" alt="" width="200" class="rounded-md"
                            id="preview">
                    </div>
                    <div class="flex justify-end mt-9">
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <i class="bi bi-plus"></i> Add Photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('jsexternal')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
