@extends('frontend.layouts.layoutusers')
@section('content')
<!-- nav title -->
<section class="mt-24">
    <div class="p-5 text-center bg-blue-900">
        <h1 class="text-2xl font-semibold text-white">Sarana Prasarana</h1>
    </div>
</section>
<!--end nav title -->


<!-- Gallery Foto -->
<section>
    <div class="flex justify-center w-full mt-12">
        <div class="w-3/4">
            <div class="flex">
                <div class="flex items-center w-1 h-10 bg-gray-800 rounded-full ">
                </div>
                <div>
                    <h1 class="flex items-center pl-4 text-xl font-semibold border-gray-900 ">Sarana Prasarana</h1>
                </div>
            </div>
            <form action="" method="get" class="mt-8">
                @csrf
                <input type="search" class="w-1/2 rounded-lg text-slate-900" placeholder="Search..." name="search" value="{{ request('search') }}">
            </form>
            <div class="mt-5">
                <div class="flex flex-wrap items-center mt-12">
                    @if (count($dataSarana))
                        @foreach ($dataSarana as $sarana)
                        <div class="items-center w-full p-1 pt-8 md:w-1/2">
                            <div class="overflow-hidden border rounded-lg bg-teal-50 aspect-w-16">
                                <img src="/images/{{ $sarana->pictures }}" class="object-cover w-full h-full max-w-screen-md transition duration-500 ease-in-out sm:h-56 hover:scale-105 hover:rounded-none" alt="">
                            </div>
                            <p class="font-semibold tracking-tight text-center text-gray-900">{{ $sarana->judul }}</p>
                        </div>
                        @endforeach
                    @else
                        <div class="w-full p-1 pt-8 md:w-1/3">
                            <p class="font-semibold tracking-tight text-gray-900">Foto tidak ditemukan</p>
                        </div>
                    @endif


                </div>
            </div>
            <div class="mt-12">
                {{ $dataSarana->links() }}
            </div>
    </div>
    </div>
</section>
<!-- end Gallery Foto -->

@endsection
