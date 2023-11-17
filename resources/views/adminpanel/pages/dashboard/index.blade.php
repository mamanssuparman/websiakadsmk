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

    <div class="p-4 mx-8 ">
        <section>
            <div class="w-full px-4 py-4">
                <h1 class="font-thin text-gray-400">#INFO USER</h1>
                <div class="flex gap-4 ">
                    <div class="flex flex-wrap w-1/2 gap-4 bg-white p-9">
                        <i class="text-5xl text-gray-500 bi bi-people"></i>
                        <h3 class="mt-2 text-xl font-thin">Jumlah Users</h3>
                        <h1 class="ml-auto text-5xl font-bold text-gray-500">{{ $dataJumlahUser }}</h1>
                    </div>
                    <div class="flex flex-wrap w-1/2 gap-4 bg-white p-9">
                        <i class="text-5xl text-gray-500 bi bi-people"></i>
                        <h3 class="mt-2 text-xl font-thin">Jumlah Staff</h3>
                        <h1 class="ml-auto text-5xl font-bold text-gray-500">{{ $dataJumlahTenagaKependidikan }}</h1>
                    </div>
                    <div class="flex flex-wrap w-1/2 gap-4 bg-white p-9">
                        <i class="text-5xl text-gray-500 bi bi-people"></i>
                        <h3 class="mt-2 text-xl font-thin">Tenaga Pendidik</h3>
                        <h1 class="ml-auto text-5xl font-bold text-gray-500">{{ $dataJumlahTenagaPendidik }}</h1>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="w-full px-4 py-4">
                <h1 class="font-thin text-gray-400">#INFO PENGADUAN</h1>
                <div class="flex gap-4">
                    <div class="flex flex-wrap w-1/2 gap-4 bg-white p-9">
                        <i class="text-5xl text-gray-500 bi bi-clipboard-pulse"></i>
                        <h3 class="mt-2 text-xl font-thin">Category Article</h3>
                        <h1 class="ml-auto text-5xl font-bold text-gray-500">{{ $dataJumlahKategoriArticle }}</h1>
                    </div>
                    <div class="flex flex-wrap w-1/2 gap-4 bg-white p-9">
                        <i class="text-5xl text-gray-500 bi bi-postcard-heart-fill"></i>
                        <h3 class="mt-2 text-xl font-thin">Jumlah Article</h3>
                        <h1 class="ml-auto text-5xl font-bold text-gray-500">{{ $dataJumlahArticle }}</h1>
                    </div>
                </div>

                <div class="px-4 py-4 mt-10 bg-white">
                    <div class="flex mb-4 text-xl font-semibold text-gray-600">
                        Data Article Favorite
                    </div>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Article</th>
                                <th>Kategori </th>
                                <th>Tanggal Pengaduan</th>
                                <th>Jumlah View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>20 Januari 2050</td>
                                <td>
                                    <i class="bi bi-list"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>20 Januari 2050</td>
                                <td>
                                    <i class="bi bi-list"></i>
                                </td>
                            </tr>
                    </table>

                </div>
            </div>
        </section>
    </div>
@endsection
