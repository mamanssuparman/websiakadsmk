@extends('frontend.layouts.layoutusers')
@section('title')
    {{ $detailArticle->judul }}
@endsection
@section('content')
    <!-- nav title -->
    <section class="mt-24 bg-red-800">
        <div class="p-5 text-center bg-blue-900">
            <h1 class="text-2xl font-semibold text-white">Detail Article</h1>
        </div>
    </section>
    <!--end nav title -->

    <section>
        <div class="flex w-full h-full">
            <div class="flex w-full bg-white">
                <div class="flex flex-col w-full px-4 py-4 lg:flex-row md:flex-col">
                    <!-- Start Kiri  -->
                    <div class="justify-center px-4 md:w-3/4">
                        <div class="flex flex-col w-full">
                            {{-- Start Article --}}
                            <div class="flex flex-col pb-4">
                                <div class="text-xl font-semibold text-slate-900" id="judularticle">
                                    {{-- {{ $detailArticle->judul }} --}}
                                </div>
                                <div class="text-xs text-slate-900">
                                    Posted By <i class="bi bi-person-fill"></i> <span id="users-post"></span>, <i
                                        class="bi bi-calendar-date"></i>
                                    {{ $detailArticle->created_at->diffForHumans() }}<i class="bi bi-bookmark-fill"></i><a
                                        href="{{ url('article') }}?category={{ $detailArticle->categori->slug }}">
                                        {{ $detailArticle->categori->categoryname }}</a>
                                </div>
                            </div>
                            <hr>
                            <div class="pt-4 text-sm">
                                <div class="flex flex-col">
                                    <div class="flex w-auto lg:w-96">
                                        <img id="header-picture" src="" alt="" class="w-full h-full rounded-md shadow-md">
                                    </div>
                                    <div class="text-justify" id="detail-article">
                                        {{-- {!! $detailArticle->article !!} --}}

                                    </div>
                                </div>
                            </div>
                            {{-- End Article --}}
                        </div>
                    </div>
                    <!-- End Kiri  -->
                    <!-- Start Kanan -->
                    <div class="px-4 md:w-1/4">
                        <div class="flex flex-col justify-center">
                            <div class="flex w-full">
                                <div class="flex flex-col w-full">
                                    <div class="text-xl font-semibold">Cari Article</div>
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
                                                <a href="{{ url('article') }}?category={{ $categori->slug }}">
                                                    <li>{{ $categori->categoryname }}</li>
                                                </a>
                                            @endforeach
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Kanan -->
                </div>
            </div>

        </div>
    </section>
@endsection
@push('jsexternal')
    <script type="text/javascript">
    var storagePath = "{!! asset('storage/images/') !!}";
    </script>
    <script src="{{ url('') }}/jsusers/detailarticle/index.js"></script>
@endpush
