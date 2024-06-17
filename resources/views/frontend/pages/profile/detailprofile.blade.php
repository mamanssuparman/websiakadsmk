@extends('frontend.layouts.layoutusers')
@section('title')
    {{ $dataProfile->judul }}
@endsection
@section('content')


<!-- nav title -->
<section class="mt-24">
    <div class="p-5 text-center bg-blue-900">
        <h1 class="text-2xl font-semibold text-white">Profile</h1>
    </div>
</section>
<!--end nav title -->


<!-- profile detail -->
<section>
    <div class="flex justify-center w-full mt-10">
        <div class="w-3/4">
            <h1 class="text-2xl font-semibold">{{ $dataProfile->judul }}</h1>
            <hr class="w-64 mt-2">
            <p class="mt-5 text-sm text-justify">
                {!! $dataProfile->description !!}
            </p>
        </div>
    </div>
</section>
<div class="pb-10">

</div>
<!-- end profile detail -->

@endsection
