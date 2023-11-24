@extends('adminpanel.layouts.layoutadmin')
@section('content')
    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>
            <a class="px-4 py-1 font-semibold text-white bg-yellow-500 rounded-md" href="{{ url('admin') }}/prodi">
                <span class="bi bi-arrow-counterclockwise"></span> Kembali
            </a>

        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="flex flex-col lg:flex-row">
            <div class="flex justify-center w-full p-2 bg-gray-100 rounded-md lg:w-1/3">
                <img src="/images/{{ $dataprodi->logoprodi }}" alt="" class="w-auto h-auto rounded-md" alt="Logo Jurusan">
            </div>
            <div class="mx-2 lg:w-2/3">
                <h1 class="text-2xl font-semibold">{{ $dataprodi->judul }}</h1>
                <p class="mt-2 font-thin text-justify">
                    {{ $dataprodi->description }}
                </p>
                <hr class="my-5 border-gray-800">
                <div class="flex flex-wrap gap-12">
                    <div class="w-32 overflow-hidden">
                        <img src="/images/{{ $dataprodi->kajur->photos }}" alt="Photos Kajur" class="object-cover w-full h-auto rounded-md min-h-32">
                    </div>
                    <div>
                        <h1 class="text-xl font-thin">Ketua Jurusan</h1>
                        <table class="mt-5 w-80">
                            <tr>
                                <td>NIP</td>
                                <td>: {{ $dataprodi->kajur->nip }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $dataprodi->kajur->nama }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-10 py-4 mt-4 border border-dashed rounded-lg">
            <div class="flex justify-between px-4">
                <div class="flex flex-col">
                    <div class="font-semibold">
                        Materi yang dipelajari :
                    </div>
                    @foreach ($datamapel as $mapel)
                        <li type="1" class="">{{ $mapel->deskripsi }}</li>
                    @endforeach
                </div>
                <div class="flex flex-col">
                    <div class="font-semibold">
                        Profesi / Bidang Pekerjaan
                    </div>
                    @foreach ($datapekerjaan as $pekerjaan)
                        <li type="1">{{ $pekerjaan->deskripsi }}</li>
                    @endforeach
                </div>
                <div class="flex flex-col">
                    <div class="font-semibold">
                        Prestasi
                    </div>
                    @foreach ($dataprestasi as $prestasi)
                        <li type="1">{{ $prestasi->deskripsi }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
