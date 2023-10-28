@extends('frontend.layouts.layoutusers')
@section('content')
<!-- nav title -->
<section class="mt-24">
    <div class="p-5 text-center bg-blue-900">
        <h1 class="text-2xl font-semibold text-white">Gallery Foto</h1>
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
                    <h1 class="flex items-center pl-4 text-xl font-semibold border-gray-900 ">Gallery Foto</h1>
                </div>
            </div>
            <form action="" method="" class="mt-8">
                <input type="search" class="w-1/2 rounded-lg text-slate-900" placeholder="Search...">
            </form>
            <div class="mt-5">
                <div class="flex flex-wrap items-start mt-12">
                    <div class="w-full p-1 pt-8 md:w-1/3">
                      <div class="overflow-hidden rounded-lg aspect-w-16">
                          <img src="/images/article-1.jpg" class="object-cover w-full h-full max-w-md transition ease-out sm:h-56 hover:scale-105 hover:rounded-none" alt="">
                      </div>
                        <p class="font-semibold tracking-tight text-gray-900">Profile SMKN 3 BANJAR</p>
                    </div>
                    <div class="w-full p-1 pt-8 md:w-1/3">
                      <div class="overflow-hidden rounded-lg aspect-w-16">
                          <img src="/images/article-1.jpg" class="object-cover w-full h-full max-w-md transition ease-out sm:h-56 hover:scale-105 hover:rounded-none" alt="">
                      </div>
                        <p class="font-semibold tracking-tight text-gray-900">Profile SMKN 3 BANJAR</p>
                    </div>
                    <div class="w-full p-1 pt-8 md:w-1/3">
                      <div class="overflow-hidden rounded-lg aspect-w-16">
                          <img src="/images/article-1.jpg" class="object-cover w-full h-full max-w-md transition ease-out sm:h-56 hover:scale-105 hover:rounded-none" alt="">
                      </div>
                        <p class="font-semibold tracking-tight text-gray-900">Profile SMKN 3 BANJAR</p>
                    </div>
                    <div class="w-full p-1 pt-8 md:w-1/3">
                      <div class="overflow-hidden rounded-lg aspect-w-16">
                          <img src="/images/article-1.jpg" class="object-cover w-full h-full max-w-md transition ease-out sm:h-56 hover:scale-105 hover:rounded-none" alt="">
                      </div>
                        <p class="font-semibold tracking-tight text-gray-900">Profile SMKN 3 BANJAR</p>
                    </div>
                    <div class="w-full p-1 pt-8 md:w-1/3">
                      <div class="overflow-hidden rounded-lg aspect-w-16">
                          <img src="/images/article-1.jpg" class="object-cover w-full h-full max-w-md transition ease-out sm:h-56 hover:scale-105 hover:rounded-none" alt="">
                      </div>
                        <p class="font-semibold tracking-tight text-gray-900">Profile SMKN 3 BANJAR</p>
                    </div>
                    <div class="w-full p-1 pt-8 md:w-1/3">
                      <div class="overflow-hidden rounded-lg aspect-w-16">
                          <img src="/images/article-1.jpg" class="object-cover w-full h-full max-w-md transition ease-out sm:h-56 hover:scale-105 hover:rounded-none" alt="">
                      </div>
                        <p class="font-semibold tracking-tight text-gray-900">Profile SMKN 3 BANJAR</p>
                    </div>
                </div>
            </div>
            <div class="mt-12">
                <ul class="inline-flex -space-x-px text-sm">
                    <li>
                      <a href="#" class="flex items-center justify-center h-8 px-3 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <li>
                      <a href="#" aria-current="page" class="flex items-center justify-center h-8 px-3 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
                    </li>
                    <li>
                      <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                      <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
                    </li>
                    <li>
                      <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                      <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                      <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                  </ul>
            </div>
    </div>
    </div>
</section>
<!-- end Gallery Foto -->

@endsection
