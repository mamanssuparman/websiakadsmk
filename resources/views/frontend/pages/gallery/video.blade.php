@extends('frontend.layouts.layoutusers')
@section('title')
    Gallery Video
@endsection
@section('content')
    <!-- nav title -->
    <section class="mt-24">
        <div class="p-5 text-center bg-blue-900">
            <h1 class="text-2xl font-semibold text-white">Gallery Video</h1>
        </div>
    </section>
    <!--end nav title -->


    <!-- Gallery Video -->
    <section>
        <div class="flex justify-center w-full mt-12">
            <div class="w-3/4">
                <div class="flex">
                    <div class="flex items-center w-1 h-10 bg-gray-800 rounded-full ">
                    </div>
                    <div>
                        <h1 class="flex items-center pl-4 text-xl font-semibold border-gray-900 ">Gallery Video</h1>
                    </div>
                </div>
                <form action="" method="get" class="mt-8">
                    <input type="search" class="w-1/2 rounded-lg text-slate-900" placeholder="Search..." name="search" value="{{ request('search') }}">
                </form>
                <div class="mt-5">
                    <div class="flex flex-wrap items-start mt-12">
                        @if (count($dataVideo))
                                @foreach ($dataVideo as $video)
                                <div class="w-full p-1 pt-8 md:w-1/3">
                                    <div class="overflow-hidden rounded-lg aspect-w-16">
                                        <iframe
                                            class="object-cover w-full h-full max-w-md transition ease-out sm:h-56 hover:scale-105 hover:rounded-none"
                                            width="560" height="315"
                                            src="https://www.youtube.com/embed/{{ $video->urlvideo }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                    <p class="font-semibold tracking-tight text-gray-900">{{ $video->judul }}</p>
                                </div>
                                @endforeach
                        @else
                            <div class="w-full p-1 pt-8 md:w-1/3">
                                <p class="font-semibold tracking-tight text-gray-900">Video tidak ditemukan</p>
                            </div>
                       @endif

                    </div>
                </div>
                <div class="mt-12">
                    {{ $dataVideo->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- end Gallery Video -->
@endsection
