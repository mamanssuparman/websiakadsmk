@extends('adminpanel.layouts.layoutadmin')
@push('csjsexternal')
    <script src="/assetsadmin/js/jquery-3.7.0.js"></script>
    <script src="/assetsadmin/js/jquery.dataTables.min.js"></script>
    <script src="/assetsadmin/js/dataTables.tailwindcss.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assetsadmin/css/dataTables.tailwindcss.min.css">


@endpush
@section('content')
    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>
            <div>
                <a href="{{ url('admin') }}/gtk" class="px-4 py-2 font-semibold text-white bg-yellow-500 rounded-md"><i
                        class="bi bi-arrow-counterclockwise"></i>Kembali</a>
            </div>
        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="flex gap-4 mb-4">
            <button type="button" id="btn_profile" class="text-blue-800">Profile</button>
            <button type="button" id="btn_ubahpassword" class="">Ubah Password</button>
        </div>
        <hr class="mb-4 border border-slate-300">
        <div id="profile" class="">
            <form action="" method="post">
                <div class="flex flex-wrap gap-3 mb-4">
                    <div class="w-full sm:w-1/2">
                        <div class="mb-4">
                            <label for="nuptk" class="block">NUPTK</label>
                            <input id="nuptk" name="nuptk" type="number"
                                class="w-full border rounded-md border-slate-300 ">
                        </div>
                        <div class="mb-4">
                            <label for="nip" class="block">NIP</label>
                            <input id="nip" name="nip" type="number"
                                class="w-full border rounded-md border-slate-300 ">
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block">Nama</label>
                            <input id="nama" type="text" class="w-full border rounded-md border-slate-300">
                        </div>
                        <div class="mb-4">
                            <label for="jenisKelamin" class="block ">Jenis Kelamin</label>
                            <select id="jenisKelamin" name="jenisKelamin"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option selected>--Pilih Jenis Kelamin--</option>
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="block ">Alamat</label>
                            <textarea id="alamat" name="alamat" class="w-full p-3 rounded-md border-slate-300" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="w-full sm:flex-1">
                        <div class="mb-4">
                            <label for="pendidikanTerakhir" class="block ">Pendidikan Terakhir</label>
                            <select id="pendidikanTerakhir" name="pendidikanTerakhir"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option selected>--Pilih Pendidikan Terakhir--</option>
                                <option value="s1">S1</option>
                                <option value="s2">S2</option>
                                <option value="s3">S3</option>
                                <option value="d1">D1</option>
                                <option value="d2">D2</option>
                                <option value="d3">D3</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="jabatan" class="block ">Jabatan</label>
                            <select id="jabatan" name="jabatan"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option selected>--Pilih Jabatan--</option>
                                <option value="guru">Guru</option>
                                <option value="kepalaSekolah">Kepala Sekolah</option>
                                <option value="tenagaKependidikan">Tenaga Kependidikan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="tugasTambahan" class="block ">Tugas Tambahan</label>
                            <select id="tugasTambahan" name="tugasTambahan"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option selected>--Pilih Tugas Tambahan--</option>
                                <option value="">--</option>
                                <option value="">--</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block ">Role</label>
                            <select id="role" name="role"
                                class="block w-full p-2 bg-white border rounded-md border-slate-300 focus:ring-blue-500 focus:border-blue-500">
                                <option selected>--Pilih Role--</option>
                                <option value="guru">Guru</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="fotoProfile" class="block ">Foto Profile</label>
                            <input id="fotoProfile" name="fotoProfile" type="file"
                                class="w-full border rounded-md selec border-slate-300">
                        </div>
                        <div class="mb5">
                            <img src="/dist/image/kepala-sekolah.jpg" class="rounded-md" width="120" alt="">
                        </div>
                    </div>
                </div>

                <div class="w-full p-5 border rounded-md border-slate-300">
                    <div class="relative overflow-x-auto sm:rounded-md">
                        <div class="mb-9">
                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold text-slate-900 ">Mapel Ajar</h3>
                                <button type="button" class="px-4 py-2 text-white bg-green-700 rounded-md" data-modal-target="default-modal" data-modal-toggle="default-modal">Choose Mapel</button>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
                            <thead class="text-xs text-black uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Mapel
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-black bg-transparent border-0 border-t border-b">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap ">
                                        1
                                    </th>
                                    <td class="px-6 py-4">
                                        Produktif RPL
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="" class="px-1 text-white bg-red-500 rounded-md "><i class="bi bi-x"></i></a>
                                    </td>
                                </tr>
                                <tr class="text-black bg-transparent border-0 border-t border-b">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap ">
                                        2
                                    </th>
                                    <td class="px-6 py-4">
                                        Pendidikan Agama
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="" class="px-1 text-white bg-red-500 rounded-md"><i
                                                class="bi bi-x"></i></a>
                                    </td>
                                </tr>
                                <tr class="text-black bg-transparent border-0 border-t border-b">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap ">
                                        3
                                    </th>
                                    <td class="px-6 py-4">
                                        PPKN
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="" class="px-1 text-white bg-red-500 rounded-md"><i
                                                class="bi bi-x"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="flex justify-end mt-3">
                    <button type="submit"
                        class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800"><i
                            class="bi bi-database-down"></i> Update</button>
                </div>

            </form>
        </div>
        <div id="ubah_password" class="hidden">
            <form action="" method="post" class="sm:w-1/2">
                <div class="mb-5 ">
                    <label for="password" class="block">Password Baru</label>
                    <input id="password" name="password" type="password"
                        class="w-full border rounded-md border-slate-300 ">
                </div>
                <div class="mb-5">
                    <label for="password" class="block">Cocokan Password</label>
                    <input id="password" name="cocokan_password" type="password"
                        class="w-full border rounded-md border-slate-300 ">
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-5 py-3 font-semibold text-white bg-blue-700 rounded-md mt-9 hover:bg-blue-800"><i
                            class="bi bi-database-down"></i> Update Password</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Start Modal Data Mata Pelajaran --}}
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Data Mata Pelajaran
                    </h3>
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 ml-auto text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 " data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <table id="example" class="w-full bg-white border rounded-md display border-slate-300">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produktif RPL</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    PPkn
                                </td>
                                <td>
                                    <a href="/src/page/gtkdetail.html">
                                        <i class="px-2 py-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-check"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    B. Indonesia
                                </td>
                                <td>
                                    <a href="/src/page/gtkdetail.html">
                                        <i class="px-2 py-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-check"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    B. Inggris
                                </td>
                                <td>
                                    <a href="/src/page/gtkdetail.html">
                                        <i class="px-2 py-1 text-white bg-blue-700 rounded-md hover:bg-blue-800 bi bi-check"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b ">

                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Data Mata Pelajaran --}}
@endsection
@push('jsexternal')
    <script>
        // mengambul semua elemet
        const btn_profile = document.getElementById('btn_profile');
        const btn_ubahpassword = document.getElementById('btn_ubahpassword');

        const content_profile = document.getElementById('profile');
        const content_ubah_password = document.getElementById('ubah_password');

        btn_profile.addEventListener('click', function() {
            content_profile.style.display = 'block';
            // Tandai tombol "Profile" sebagai aktif
            btn_profile.classList.add('text-blue-800');
            btn_ubahpassword.classList.remove('text-blue-800');
            content_ubah_password.style.display = 'none';
        });

        btn_ubahpassword.addEventListener('click', function() {
            content_profile.style.display = 'none';
            btn_ubahpassword.classList.add('text-blue-800');
            btn_profile.classList.remove('text-blue-800');
            content_ubah_password.style.display = "block";
        });
    </script>
@endpush
