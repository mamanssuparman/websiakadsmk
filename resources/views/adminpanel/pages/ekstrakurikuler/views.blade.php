@extends('adminpanel.layouts.layoutadmin')
@section('content')
    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>
            <a href="{{ url('admin') }}/ekstrakurikuler/" class="px-2 py-1 text-white bg-yellow-500 rounded-md">
                <span class="bi bi-arrow-counterclockwise"></span>
                Kembali
            </a>
        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="flex justify-center">
            <div class="flex flex-col w-3/4 gap-12 lg:flex-row">
                <div class="flex justify-center w-full p-2 bg-gray-100 rounded-lg lg:w-1/3">
                    <img src="/images/{{ $dataEkstra->headerpicture }}" alt="Logo Jurusan" class="w-auto h-auto">
                </div>
                <div class="lg:w-2/3">
                    <h1 class="text-xl font-semibold">{{ $dataEkstra->judul }}</h1>
                    <p class="mt-2 font-thin text-justify">
                        {{ $dataEkstra->description }}
                    </p>
                    <hr class="my-5 border-gray-400">
                    <div class="flex flex-wrap gap-12">
                        <div class="w-32 overflow-hidden">
                            <img src="/images/{{ $dataEkstra->pembina->photos }}" alt="">
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold">Pembina Ekstra</h1>
                            <table class="mt-5 w-80">
                                <tr>
                                    <td>NIP</td>
                                    <td>: {{ $dataEkstra->pembina->nip }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{ $dataEkstra->pembina->nama }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
