@extends('adminpanel.layouts.layoutadmin')

@section('content')
    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>
            <a href="{{ url('admin') }}/article" class="px-2 py-1 font-semibold text-white bg-yellow-500 rounded-md"><i class="bi bi-arrow-counterclockwise"></i> Kembali</a>

        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="flex flex-col w-full lg:flex-row md:flex-col">
            <div class="flex px-10 lg:w-full md:w-full sm:w-full">
                <div class="flex flex-col justify-start px-4 py-4">
                    <div class="flex pb-4">
                        <div class="flex flex-col">
                            <div class="text-xl font-semibold text-slate-900">
                                {{ $dataArticle->judul }}
                            </div>
                            <div class="text-sm text-slate-500">
                                Posted By <i class="bi bi-person-fill"></i> {{ $dataArticle->user->role }} , <i class="bi bi-calendar-date"></i> {{ $dataArticle->created_at }}, <i class="bi bi-bookmark-fill"></i>{{ $dataArticle->categori->categoryname }}
                            </div>
                        </div>
                    </div>
                    <div class="text-sm">
                        <div class="flex flex-col">
                            <div class="flex w-auto lg:w-96">
                                <img src="/images/{{ $dataArticle->headerpicture }}" alt="Header Berita">
                            </div>
                            <div class="text-justify text-slate-950">
                                {!! $dataArticle->article !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
