@extends('frontend.layouts.layoutusers')
@section('content')
    <!-- Program Keahlian -->
    {{-- @dd($dataProdi) --}}
    <section class="mt-24">
        <div class="p-5 bg-blue-900">
            <div class="flex justify-center ">
                <div class="flex flex-col w-3/4 gap-12 lg:flex-row ">
                    <div class="flex justify-center w-full p-2 bg-gray-100 rounded-lg lg:w-1/3 ">
                        <img src="/images/{{ $dataProdi->logoprodi }}" class="w-auto h-auto" alt="">
                    </div>
                    <div class="text-white lg:w-2/3">
                        <h1 class="text-xl font-semibold">{{ $dataProdi->judul }}</h1>
                        <p class="mt-2 font-thin text-justify">
                           {{ $dataProdi->description }}
                        </p>
                        <hr class="my-5 border-gray-400">
                        <div class="flex flex-wrap gap-12 ">
                            <div class="w-32 overflow-hidden">
                                <img src="/images/{{ $dataProdi->kajur->photos }}" class="object-cover w-full h-auto rounded-md min-h-32"
                                    alt="">
                            </div>
                            <div>
                                <h1 class="text-xl font-thin text-white">Ketua Program Studi</h1>
                                <table class="mt-5 text-white w-80">
                                    <tr>
                                        <td>NIP</td>
                                        <td>: {{ $dataProdi->kajur->nip }}</td>
                                    </tr>
                                    <tr>
                                        <td>NAMA</td>
                                        <td>: {{ $dataProdi->kajur->nama }}</td>
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

    <!-- Informasi Lainnya -->
    <section class="mt-12 mb-12">
        <div class="flex justify-center">
            <div class="flex flex-wrap w-3/4">
                <div class="mt-4 mb-4 md:w-1/2">
                    <div class="flex">
                        <div class="w-1 h-8 mr-4 bg-gray-900 rounded-full">
                        </div>
                        <div>
                            <h1 class="text-xl font-semibold">Materi Yang Dipelajari</h1>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="ml-12">
                        <ol class="list-decimal">
                            @foreach ($dataListMapelAjar as $mapelprodi)
                                <li>{{ $mapelprodi->deskripsi }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="mt-4 mb-4 md:w-1/2">
                    <div class="flex">
                        <div class="w-1 h-8 mr-4 bg-gray-900 rounded-full">

                        </div>
                        <div>
                            <h1 class="text-lg font-semibold">Profiesi / Bidang Kerja</h1>
                        </div>
                    </div>
                    <div class="ml-12">
                        <ol class="list-decimal">
                            @foreach ($dataListPekerjaan as $pekerjaan)
                                <li>{{ $pekerjaan->deskripsi }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="mt-4 mb-4 md:w-1/2">
                    <div class="flex">
                        <div class="w-1 h-8 mr-4 bg-gray-900 rounded-full">

                        </div>
                        <div>
                            <h1 class="text-xl font-semibold">Prestasi</h1>
                        </div>
                    </div>
                    <div class="ml-12">
                        <ol class="list-decimal">
                            @foreach ($dataListPrestasi as $prestasi)
                                <li>{{ $prestasi->deskripsi }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Informasi Lainnya -->
@endsection
