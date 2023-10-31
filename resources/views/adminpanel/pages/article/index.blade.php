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
        <div class="flex flex-row justify-between">
            <div></div>
            <a href="{{ url('admin') }}/article/add"> <div class="px-5 py-3 mb-4 font-semibold text-white bg-blue-700 rounded-lg"><i class="bi bi-plus"></i>Tambah Article</div></a>
        </div>
        <div class="overflow-y-auto">
            <table id="example" class="w-full bg-white border rounded-md display border-slate-300">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Category</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                    <td>1</td>
                    <td>PPDB 2025</td>
                    <td>Informasi</td>
                    <td>1000 x</td>
                    <td>
                        <input type="checkbox" title="Dead Part" id="toggle" checked class="">
                    </td>
                    <td>
                        <a href="{{ url('admin') }}/article/edit">
                            <i class="px-2 py-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-list"></i>
                        </a>
                    </td>
                   </tr>
                   <tr>
                    <td>2</td>
                    <td>PPDB 2025</td>
                    <td>Informasi</td>
                    <td>1000 x</td>
                    <td>
                        <input type="checkbox" title="Dead Part" id="toggle" checked class="">
                    </td>
                    <td>
                        <a href="{{ url('admin') }}/article/edit">
                            <i class="px-2 py-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-list"></i>
                        </a>
                    </td>
                   </tr>
                   <tr>
                    <td>3</td>
                    <td>PPDB 2025</td>
                    <td>Informasi</td>
                    <td>1000 x</td>
                    <td>
                        <input type="checkbox" title="Dead Part" id="toggle" checked class="">
                    </td>
                    <td>
                        <a href="{{ url('admin') }}/article/edit">
                            <i class="px-2 py-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-list"></i>
                        </a>
                    </td>
                   </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection