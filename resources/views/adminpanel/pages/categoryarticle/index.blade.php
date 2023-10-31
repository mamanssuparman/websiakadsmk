@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
    <script src="/assetsadmin/js/jquery.dataTables.min.js"></script>
    <script src="/assetsadmin/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assetsadmin/css/dataTables.tailwindcss.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
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
            <div class="w-full overflow-y-auto sm:w-1/2">
                <table id="example" class="w-full bg-white border rounded-md display border-slate-300">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                berita terkini
                            </td>
                            <td>
                                <input type="checkbox" title="Dead Part" id="toggle" checked class="">
                            </td>
                            <td>
                                <a href="/src/page/gtkdetail.html">
                                    <i class="px-2 py-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-list"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                berita terkini
                            </td>
                            <td>
                                <input type="checkbox" title="Dead Part" id="toggle" checked class="">
                            </td>
                            <td>
                                <a href="/src/page/gtkdetail.html">
                                    <i class="px-2 py-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-list"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                berita terkini
                            </td>
                            <td>
                                <input type="checkbox" title="Dead Part" id="toggle" class="">
                            </td>
                            <td>
                                <a href="/src/page/gtkdetail.html">
                                    <i class="px-2 py-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-list"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="w-full p-12 border rounded-md sm:flex-1 border-slate-300">
                <form action="" method="">
                    <div class="mb-5">
                        <label for="judulvideo" class="block">Nama Kategori</label>
                        <input id="judulvideo" name="judulvideo" type="text"
                            class="w-full border rounded-md border-slate-300 ">
                    </div>
                    <div class="mb-5">
                        <label for="deskripsi" class="block ">Deskripsi </label>
                        <textarea id="deskripsi" name="deskripsi" class="w-full p-3 rounded-md border-slate-300" rows="5"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800"><i
                                class="bi bi-plus"></i>Add Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
