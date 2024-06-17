@extends('frontend.layouts.layoutusers')
@section('title')
    {{ $dataEkstra->judul }}
@endsection
@section('content')
    <!-- Program Keahlian -->
    <section class="mt-24">
        <div class="p-5 bg-blue-900">
            <div class="flex justify-center ">
                <div class="flex flex-col w-3/4 gap-12 lg:flex-row ">
                    <div class="flex justify-center w-full p-2 bg-gray-100 rounded-lg lg:w-1/3 ">
                        <img src="/images/{{ $dataEkstra->headerpicture }}" class="w-auto h-auto" alt="">
                    </div>
                    <div class="text-white lg:w-2/3">
                        <h1 class="text-xl font-semibold">{{ $dataEkstra->judul }}</h1>
                        <p class="mt-2 font-thin text-justify">
                            {{ $dataEkstra->description }}
                        </p>
                        <hr class="my-5 border-gray-400">
                        <div class="flex flex-wrap gap-12 ">
                            <div class="w-32 overflow-hidden">
                                <img src="/images/{{ $dataEkstra->pembina->photos }}" class="object-cover w-full h-auto rounded-md min-h-32"
                                    alt="">
                            </div>
                            <div>
                                <h1 class="text-xl font-thin text-white">Pembina Ekstra</h1>
                                <table class="mt-5 text-white w-80">
                                    <tr>
                                        <td>NIP</td>
                                        <td>:{{ $dataEkstra->pembina->nip }}</td>
                                    </tr>
                                    <tr>
                                        <td>NAMA</td>
                                        <td>:{{ $dataEkstra->pembina->nama }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end Program Keahlian -->


@endsection
