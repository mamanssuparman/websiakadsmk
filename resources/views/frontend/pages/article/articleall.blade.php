@extends('frontend.layouts.layoutusers')
@section('content')
    <!-- nav title -->
    <section class="mt-24">
        <div class="p-5 text-center bg-blue-900">
            <h1 class="text-2xl font-semibold text-white">List Article</h1>
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
                        @if (count($dataArticle))
                            @foreach ($dataArticle as $article)    
                            <div class="mx-3">
                                <a href="{{ url('') }}/article/{{ $article->slug }}" class="mt-3 text-xl font-semibold"><h1>{{ $article->judul }}</h1></a>
                                <small class="text-slate-800">Posted By <i class="bi bi-person-fill"></i>Admin | <i
                                        class="bi bi-calendar-date"></i>27 Oktober 2024 | <i
                                        class="bi bi-bookmark-fill"></i> <a href="{{ url('article') }}?category={{ $article->categori->slug }}"> {{ $article->categori->categoryname }} </a></small>
                                <div class="w-full h-[1px] bg-slate-800"></div>
                                <div class="mt-3">
                                    {!! substr($article->article, 0, 150) !!} ...
                                </div>
                                <hr class="mt-3 mb-3">
                            </div>
                            @endforeach
                        @else
                            <div class="mx-3">
                                <h1 class="text-slate-900 font-semibold">Article tidak ditemukan</h1>
                            </div>
                        @endif
                        
                        
                        <!-- Start Pagination -->
                        <div class="mt-4">
                            {{ $dataArticle->links() }}
                        </div>
                        <!-- End Pagination -->
                    </div>

                </div>
                <!-- End Kiri  -->
                <!-- Start Kanan  -->
                <div class="flex  lg:w-[700px] md:w-full sm:w-full h-full justify-start ">
                    <div class="w-full px-10">
                        <div class="flex flex-col w-full mt-8">
                            <div class="text-xl font-semibold">Cari Berita</div>
                            <form action="" method="get">
                                <div class="mt-2">
                                    <input type="text" class="w-full h-8 rounded-md border-slate-500"
                                        placeholder="Search ...." name="search" value="{{ request('search') }}">
                                </div>
                            </form>
                            <div class="mt-8 text-xl font-semibold text-slate-900">
                                Kategori Article
                            </div>
                            <div class="w-full h-[2px] bg-slate-500 rounded-full mt-3">

                            </div>
                            <div class="mt-3">
                                <ul class="pl-8">
                                    @foreach ($listCategori as $categori)
                                    <li type="circle"> <a href="{{ url('article') }}?category={{ $categori->slug }}"> {{ $categori->categoryname }} </a> </li>
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
