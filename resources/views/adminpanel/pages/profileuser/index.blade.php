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
        <div class="mb-4 border-b border-gray-200 ">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 " id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Ubah Password</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="flex flex-row w-full">
                    <div class="flex w-full">
                        <div class="flex flex-col w-full px-4">
                            <div class="text-slate-900">
                                NUPTK
                            </div>
                            <div class="pb-2">
                                <input type="text" name="" id="" class="w-full h-8 rounded-md border-slate-300">
                            </div>
                            <div class="text-slate-900">
                                NIP
                            </div>
                            <div class="pb-2">
                                <input type="text" class="w-full h-8 rounded-md border-slate-300">
                            </div>
                            <div class="text-slate-900">
                                Nama
                            </div>
                            <div class="pb-2">
                                <input type="text" name="" id="" class="w-full h-8 rounded-md border-slate-300">
                            </div>
                            <div class="text-slate-900">
                                Jenis Kelamin
                            </div>
                            <div class="pb-2">
                                <select name="" id="" class="w-full h-8 px-2 py-1 rounded-md border-slate-300 text-slate-600">
                                    <option value="">-- Pilih Jenis Kelamin</option>
                                </select>
                            </div>
                            <div class="text-slate-900">
                                Alamat
                            </div>
                            <div>
                                <textarea name="" id=""  rows="5" class="w-full rounded-md border-slate-300"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full">
                        <div class="flex flex-col w-full px-4">
                            <div class="text-slate-900">
                                Pendidikan Terakhir
                            </div>
                            <div class="pb-2">
                                <select name="" id="" class="w-full h-8 px-2 py-1 rounded-md border-slate-300 text-slate-600">
                                    <option value="">-- Pilih Pendidikan Terakhir --</option>
                                </select>
                            </div>
                            <div class="text-slate-900">
                                Jabatan
                            </div>
                            <div class="pb-2">
                                <select name="" id="" class="w-full h-8 px-2 py-1 rounded-md border-slate-300 text-slate-600">
                                    <option value="">-- Pilih Jabatan --</option>
                                </select>
                            </div>
                            <div class="text-slate-900">
                                Tugas Tambahan
                            </div>
                            <div class="pb-2">
                                <select name="" id="" class="w-full h-8 px-2 py-1 rounded-md border-slate-300 text-slate-600">
                                    <option value="">-- Pilih Tugas Tambahan --</option>
                                </select>
                            </div>
                            <div>
                                Foto Profile
                            </div>
                            <div class="pb-2">
                                <input type="file" name="" id="" class="w-full h-8 bg-gray-200 rounded-md">
                            </div>
                            <div>
                                <div class="container items-center w-32 border-2 border-dashed rounded-md h-44">

                                </div>
                            </div>
                            <div class="flex flex-row justify-between">
                                <div></div>
                                <div class="px-4 py-2 text-white bg-blue-700 rounded-md">
                                    <i class="bi bi-database-fill-check"></i> Perbaharui
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden p-4 " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                <div class="flex flex-row w-full">
                    <div class="flex w-full">
                        <div class="flex flex-col w-full">
                            <div class="text-slate-900">
                                Password Baru
                            </div>
                            <div class="pb-2">
                                <input type="password" name="" id="" class="w-full h-8 rounded-md border-slate-300">
                            </div>
                            <div class="text-slate-900">
                                Cocokan Password
                            </div>
                            <div class="pb-2">
                                <input type="password" name="" id="" class="w-full h-8 rounded-md border-slate-300">
                            </div>
                            <div class="flex flex-row justify-between">
                                <div></div>
                                <div>
                                    <button class="px-4 py-2 text-white bg-blue-700 rounded-md"><i class="bi bi-database-fill-check"></i> Ubah Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full">

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
