@extends('frontend.layouts.layoutusers')
@section('content')
    <!-- Program Keahlian -->
    <section class="mt-24">
        <div class="p-5 bg-blue-900">
            <div class="flex justify-center ">
                <div class="flex flex-col w-3/4 gap-12 lg:flex-row ">
                    <div class="flex justify-center w-full p-2 bg-gray-100 rounded-lg lg:w-1/3 ">
                        <img src="/dist/images/logo-jurusan-rpl.png" class="w-auto h-auto" alt="">
                    </div>
                    <div class="text-white lg:w-2/3">
                        <h1 class="text-xl font-semibold">Rekayasa Perangkat Lunak</h1>
                        <p class="mt-2 font-thin text-justify">
                            Semakin berkembangnya teknologi informasi, dibutuhkan lulusan yang dapat mengikuti perkembangan
                            teknologi. Oleh karena itu SMK Negeri 3 Banjar membuka jurusan RPI sejak tahun ajaran 2006/2007
                            untuk memenuhi kebutuhan tenaga programmer muda di Indonesia.
                            Program studi Software Engineering (Rekayasa Perangkat Lunak) memberikan pengetahuan tentang
                            prinsip dan teknik untuk mendesain perangkat lunak yang tepat guna, tangguh, dan mudah
                            digunakan. Para siswa akan mempelajari cara mendesain dan menganalisis algoritma
                            dan pemrograman menggunakan struktur data yang efisien serta mengembangkan sistem operasi dan
                            aplikasi berbasis desktop, web dan mobile (perangkat bergerak)
                        </p>
                        <hr class="my-5 border-gray-400">
                        <div class="flex flex-wrap gap-12 ">
                            <div class="w-32 overflow-hidden">
                                <img src="/images/contohfoto.jpg" class="object-cover w-full h-auto min-h-32 rounded-md"
                                    alt="">
                            </div>
                            <div>
                                <h1 class="text-xl font-thin text-white">Ketua Program Studi</h1>
                                <table class="mt-5 text-white w-80">
                                    <tr>
                                        <td>NIP</td>
                                        <td>:99900999900</td>
                                    </tr>
                                    <tr>
                                        <td>NAMA</td>
                                        <td>:Wahyu Suryaman, S.T</td>
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
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
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
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
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
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxxxx</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Informasi Lainnya -->
@endsection
