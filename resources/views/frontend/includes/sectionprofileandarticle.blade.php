<section class="py-10 {{ $dataCarousel->count() >1 ? '' : 'mt-20' }}">
    <div class="flex">
        <div class="flex flex-col w-full lg:flex-row md:flex-row">
            <!-- Start Coloumn Kiri -->
            <div class="flex w-full ">
                <div class="flex flex-col justify-center px-4 py-12">
                    <h1 class="pb-4 font-mono text-3xl font-semibold" id="body_judul_video_sekolah"><h1>
                    <div class="flex object-center pb-4">
                        <div class="flex w-full h-full">
                            <div class="flex justify-center ">
                                <iframe src="https://www.youtube.com/embed/xuqtej5trfw" frameborder="1"
                                    class="items-center lg:h-[300px] lg:w-[600px] object-cover transition ease-out hover:scale-105" id="body_video_profile"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="text-sm text-slate-500" id="body_description_video">

                    </div>
                </div>
            </div>
            <!-- End Column Kiri -->
            <!-- Start Column Kanan -->
            <div class="flex w-full overflow-hidden">

                <div class="flex flex-col px-4 pt-10">
                    <div class="flex flex-row">
                        <div class="w-1 h-10 rounded-full bg-slate-900">
                        </div>
                        <div class="flex-none">
                            <div class="flex flex-row">
                                <div class="flex items-end px-2 text-3xl font-semibold text-slate-800">
                                    Article
                                </div>
                                <div class="flex items-end text-sm text-slate-700">
                                    <a href="{{ url('') }}/article">
                                        Semua Article
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="pl-4 mt-8">
                        @foreach ($dataArticle as $article)
                        <div class="flex flex-col pb-4 sm:w-full md:w-96">
                            <div class="flex flex-row lg:w-[700px]">
                                <div class="w-full">
                                    <div class="flex flex-col">
                                        <div class="font-semibold">
                                            <a href="{{ url('') }}/article/{{ $article->slug }}">
                                            {{ $article->judul }}
                                            </a>
                                        </div>
                                        <div class="pb-2 text-sm">
                                            <a href="{{ url('') }}/article?category={{ $article->categori->slug }}"><i class="bi bi-calendar-date"></i> {{ $article->created_at->diffForHumans() }} <i
                                                class="bi bi-bookmark-fill"></i> {{ $article->categori->categoryname }}</a>
                                        </div>
                                        <div class="text-sm text-justify ">
                                            {!! substr($article->article, 0, 150) !!} ...
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>

                </div>

            </div>
            <!-- End Column Kanan -->
        </div>
    </div>
</section>
