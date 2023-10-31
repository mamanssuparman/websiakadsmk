@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
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
        <form action="" method="post">
            <div class="px-6 py-6 mb-6 border border-dashed rounded-md border-slate-300">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="nama_prodi" class="block mb-2 text-sm font-medium text-gray-900">Nama
                            Prodi</label>
                        <input type="text" id="nama_prodi" name="nama_prodi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Logo</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            id="file_input" type="file" name="logo">
                    </div>
                    <div>
                        <label for="singkatan" class="block mb-2 text-sm font-medium text-gray-900">Singkatan</label>
                        <input type="text" id="singkatan" name="singkatan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    <div>
                        <label for="ketua_jurusan" class="block mb-2 text-sm font-medium text-gray-900">Ketua
                            Jurusan</label>
                        <select id="ketua_jurusan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected>--Pilih Ketua Jurusan--</option>
                            <option value="">Yasrifan</option>
                            <option value="">Yasrifan</option>
                            <option value="">Yasrifan</option>
                            <option value="">Yasrifan</option>
                        </select>
                    </div>
                    <div>
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea id="deskripsi" rows="6"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
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
                            <tbody class="border-b border-slate-300">
                                <tr class="border-t border-slate-300">
                                    <td>1</td>
                                    <td>LKS Tingkat Kota</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                                <tr class="border-t border-slate-300">
                                    <td>2</td>
                                    <td>LKS Tingkat Kota</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                                <tr class="border-t border-slate-300">
                                    <td>3</td>
                                    <td>LKS Tingkat Kota</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                                <tr class="border-t border-slate-300">
                                    <td>4</td>
                                    <td>LKS Tingkat Kota</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full sm:flex-1">
                        <div class="flex">
                            <div class="flex-1">
                                <label for="nama_prestasi" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Prestasi</label>
                                <input type="text" id="nama_prestasi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="pt-7">
                                <button type="button"
                                    class="p-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
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
                            <tbody class="border-b border-slate-300">
                                <tr class="border-t border-slate-300">
                                    <td>1</td>
                                    <td>Software Enginer</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                                <tr class="border-t border-slate-300">
                                    <td>2</td>
                                    <td>Database Administrator</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                                <tr class="border-t border-slate-300">
                                    <td>3</td>
                                    <td>IT Support</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                                <tr class="border-t border-slate-300">
                                    <td>4</td>
                                    <td>Backend Developer</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full sm:flex-1">
                        <div class="flex">
                            <div class="flex-1">
                                <label for="nama_pekerjaan" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Pekerjaan</label>
                                <input type="text" id="nama_pekerjaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="pt-7">
                                <button type="button"
                                    class="p-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
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
                            <tbody class="border-b border-slate-300">
                                <tr class="border-t border-slate-300">
                                    <td>1</td>
                                    <td>Php</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                                <tr class="border-t border-slate-300">
                                    <td>2</td>
                                    <td>Flutter</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                                <tr class="border-t border-slate-300">
                                    <td>3</td>
                                    <td>Laravel</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                                <tr class="border-t border-slate-300">
                                    <td>4</td>
                                    <td>Database</td>
                                    <td><button type="button"
                                            class="px-1 mt-2 mb-2 mr-2 text-sm font-medium text-white bg-red-700 rounded-md focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300"><i
                                                class="bi bi-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full sm:flex-1">
                        <div class="flex">
                            <div class="flex-1">
                                <label for="nama_prestasi" class="block mb-2 text-sm font-medium text-gray-900">Mapel di
                                    Pelajari</label>
                                <input type="text" id="nama_prestasi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                            <div class="pt-7">
                                <button type="button"
                                    class="p-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <i class="bi bi-plus-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2"><i
                        class="bi bi-database-down"></i> Simpan</button>
            </div>
        </form>
    </div>
@endsection
