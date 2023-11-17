@extends('adminpanel.layouts.layoutadmin')
@section('content')
    <div class="h-16 p-4 mx-8 mt-8 bg-blue-800 rounded-tl-lg rounded-tr-lg">
        <div class="flex flex-row justify-between">
            <div class="flex font-semibold text-white">
                {{ $head }}
            </div>
            <a href="{{ url('admin') }}/profile" class="px-4 py-1 font-semibold text-white bg-yellow-500 rounded-md">
                <span class="bi bi-arrow-counterclockwise">Kembali</span>
            </a>

        </div>
    </div>
    <div class="p-4 mx-8 bg-white rounded-bl-lg rounded-br-lg">
        <div class="flex flex-col">
            <div class="mb-4 text-2xl font-semibold text-slate-600">
                {{ $dataProfile->judul }}
            </div>

            <div class="text-slate-500">
                {!! $dataProfile->description !!}
            </div>
        </div>
    </div>
@endsection
