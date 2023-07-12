@extends('frontend.layout')


@section('content')
    <nav class="flex mt-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ url('/') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <div class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                        {{ $product->title }}
                    </div>
                </div>
            </li>
        </ol>
    </nav>


    <h3 class="font-bold text-2xl my-5">{{ $product->title }}</h3>

    <div class="mt-3 flex flex-col md:flex-row gap-5 mb-10 overflow-x-auto">
        <div class="md:w-[250px] w-full">
            <div class="w-full bg-white p-4 rounded-md shadow-md">
                <div class="flex items-center justify-start mb-2 w-full">
                    {{-- <img class="w-[50px]" src="{{ asset('frontend/image/107.png') }}" alt=""> --}}
                    <img class="w-[50px]" src="{{ asset(@$product->category->logo) }}" alt="">
                </div>
                <div>
                    <div class="flex justify-between gap-4 py-3">
                        <h2>In Stock</h2>
                        <div class="font-semibold">{{ $product->stock }}</div>
                    </div>
                    <div class="flex justify-between gap-4 border-t py-3">
                        <h2>Price Of Each</h2>
                        <div class="font-semibold">{{ $product->price }}</div>
                    </div>
                    <div class="flex justify-end gap-4 border-t py-3">
                        <button class="py-2 px-7 border border-indigo-400 text-indigo-500 hover:text-white hover:bg-indigo-500 rounded">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex-1">
            <div class="bg-white shadow-md p-5 rounded-md w-full">
                {!! $product->description !!}
            </div>
        </div>
    </div>

@endsection
