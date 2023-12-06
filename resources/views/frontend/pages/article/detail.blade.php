@extends('frontend.layouts.layoutusers')
@section('content')
    <!-- nav title -->
    <section class="mt-24">
        <div class="p-5 text-center bg-blue-900">
            <h1 class="text-2xl font-semibold text-white">Detail Berita</h1>
        </div>
    </section>
    <!--end nav title -->


    <!-- Start Article detail -->
    <section class="py-6 md:py-0 sm:py-0">
        <div class="flex w-full bg-white lg:h-full">
            <div class="flex flex-col w-full lg:flex-row md:flex-col">
                <!-- Start Kiri  -->
                <div class="flex px-10 lg:w-full md:w-full sm:w-full">
                    <div class="flex flex-col justify-start px-4 py-4">
                        <div class="flex pb-4 ">
                            <div class="flex flex-col">
                                <div class="text-xl font-semibold text-slate-900">
                                    {{ $detailArticle->judul }}
                                </div>
                                <div class="text-xs text-slate-900">
                                    Posted By <i class="bi bi-person-fill"></i> {{ $detailArticle->user->role }}, <i class="bi bi-calendar-date"></i>
                                     {{ $detailArticle->created_at->diffForHumans() }}<i class="bi bi-bookmark-fill"></i><a href="{{ url('article') }}?category={{ $detailArticle->categori->slug }}"> {{ $detailArticle->categori->categoryname }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="text-sm">
                            <div class="flex flex-col">
                                <div class="flex w-auto lg:w-96">
                                    <img src="/images/{{ $detailArticle->headerpicture }}" alt="">
                                </div>
                                <div class="text-justify text-slate-950">
                                    {!! $detailArticle->article !!}

                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="flex flex-col pt-8">
                            <div class="text-xl font-semibold">
                                Komentar
                            </div>
                            <div class="mt-4">
                                <div class="flex flex-col">
                                    <input type="text" name="" id=""
                                        class="h-8 text-sm rounded-md border-slate-500 text-slate-800" placeholder="Nama">
                                    <div class="py-2">
                                    </div>
                                    <input type="text" name="" id=""
                                        class="h-8 text-sm rounded-md border-slate-500 text-slate-800" placeholder="Email">
                                    <div class="py-2">
                                    </div>
                                    <textarea name="" id="" cols="10" rows="10" class="text-sm rounded-md border-slate-500"
                                        placeholder="Isi Komentar"></textarea>
                                    <div class="py-2"></div>
                                    <div class="flex justify-end">
                                        <button
                                            class="flex px-4 py-2 text-white bg-blue-800 rounded-md hover:bg-blue-800/80"
                                            type="button">
                                            <i class="mr-2 bi bi-telegram"></i> Kirim
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="py-4">
                                <hr>
                            </div>
                            <div class="flex flex-row">
                                <div class="flex w-32 h-8 mr-1">
                                    <img src="/dist/images/user-comment.png" alt="" class="">
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-lg font-semibold text-slate-900">
                                        Nama Pengirim
                                    </div>
                                    <div class="text-sm text-slate-600">
                                        Kamis, 13 Januari 2024
                                    </div>
                                    <div class="mt-2 mb-2 text-sm text-justify text-slate-900">
                                        <p>
                                            commodo nibh id Nunc maximus faucibus nisi eu Nullam id Praesent sapien vitae
                                            placerat. consectetur placerat. viverra vel odio efficitur. venenatis amet,
                                            vitae cursus sollicitudin. id dolor amet, Praesent lacus nisi urna Vestibulum
                                            luctus
                                        </p>
                                        <p>
                                            commodo nec tortor. varius Nam est. Nunc porta dui sed Nullam non quis laoreet
                                            vitae quis at lacus nec nibh orci libero, sit convallis. lorem. viverra dui. ex
                                            eget volutpat Nam elit. non, Nunc faucibus dui enim. laoreet sed non, hendrerit
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Kiri  -->
                <!-- Start Kanan  -->
                <div class="flex  lg:w-[700px] md:w-full sm:w-full h-full justify-start ">
                    <div class="w-full px-10">
                        <div class="flex flex-col w-full mt-8">
                            <div class="text-xl font-semibold">Cari Berita</div>
                            <div class="mt-2">
                                <form action="{{ url('article') }}" method="get">
                                <input type="text" class="w-full h-8 rounded-md border-slate-500"
                                    placeholder="Search ...." name="search">
                                </form>
                            </div>
                            <div class="mt-8 text-xl font-semibold text-slate-900">
                                Kategori Article
                            </div>
                            <div class="w-full h-[2px] bg-slate-500 rounded-full mt-3">

                            </div>
                            <div class="mt-3">
                                <ul class="pl-8">
                                    @foreach ($listCategori as $categori)
                                       <a href="{{ url('article') }}?category={{ $categori->slug }}"> <li>{{ $categori->categoryname }}</li></a>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Kanan -->
            </div>
        </div>
    </section>
    <!-- end Article detail -->
@endsection
