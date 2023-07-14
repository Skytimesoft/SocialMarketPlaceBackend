@extends('frontend.layout')

@section('content')
{{-- <div x-data="{ modelOpen: false }"> --}}
@foreach ($category_with_product as $category)
    @if (count($category->products) > 0)
    <div class="w-full text-sm text-left text-gray-700 mt-10">
        <div
            class="px-3 py-4 rounded-md mb-3 flex items-center uppercase bg-white font-bold shadow relative overflow-hidden">
            <div class="flex-1">
                {{ $category->name }}
            </div>
            <div class="w-[140px] hidden lg:block text-center">
                Stock In
            </div>
            <div class="w-[140px] hidden lg:block text-center">
                Stock Out
            </div>
            <div class="w-[140px] hidden lg:block text-center">
                In stock
            </div>
            <div class="w-[140px] hidden lg:block text-center">
                Price
            </div>
            <div class="w-[140px] hidden lg:block text-right">
                Action
            </div>
            <div class="absolute rotate-180 top-full left-20 flex h-8 items-end overflow-hidden">
                <div class="flex -mb-px h-[2px] w-80 -scale-x-100">
                    <div
                        class="w-full flex-none blur-sm [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]">
                    </div>
                    <div
                        class="-ml-[100%] w-full flex-none blur-[1px] [background-image:linear-gradient(90deg,rgba(56,189,248,0)_0%,#0EA5E9_32.29%,rgba(236,72,153,0.3)_67.19%,rgba(236,72,153,0)_100%)]">
                    </div>
                </div>
            </div>
            <div class="absolute -inset-px z-[-1] rounded-md bg-gradient-to-r from-indigo-400 to-red-400"
                aria-hidden="true"></div>
        </div>
        @foreach ($category->products as $product)
        <a href="#"
            class="relative flex-col cursor-pointer sm:flex-row flex items-center bg-white mb-2 border-2 border-transparent shadow hover:border-indigo-500 rounded-md">
            <div
                class="flex-1 flex flex-col lg:flex-row justify-between w-full lg:items-center gap-4 px-3 py-4 font-medium text-gray-900 dark:text-white">
                <div class="flex justify-between w-full md:w-auto">
                    <div class="bg-indigo-500 text-white rounded-md shadow-md px-2 py-1">
                        <i class="text-2xl fa-brands fa-facebook"></i>
                    </div>

                    <div class="block lg:hidden">
                        <span>
                            {{ $product->price_currency }}
                            {{ $product->price }}
                        </span>
                        <button type="button"
                            class="text-indigo-700 border border-indigo-700 hover:bg-indigo-700 hover:text-white focus:ring-4 focus:outline-none font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>

                </div>
                <div class="flex-1">
                    {{ $product->title }}
                </div>
            </div>
            <div class="px-6 py-4 w-[140px] hidden lg:block text-center">
                0
            </div>
            <div class="px-6 py-4 w-[140px] hidden lg:block text-center">
                0
            </div>
            <div class="px-6 py-4 w-[140px] hidden lg:block text-center">
                {{ $product->stock }}
            </div>
            <div class="px-6 py-4 w-[140px] hidden lg:block text-center">
                <span>
                    {{ $product->price_currency }}
                    {{ $product->price }}
                </span>
            </div>
            <div class="px-3 py-4 w-[140px] hidden lg:block text-right">
                <button @click="$dispatch('modal', {modelOpen: true, productPrice: '{{ $product->price }}',  url: '{{ route('buy.modal', ['id' => $product->id]) }}'})" type="button" class="text-indigo-700 border border-indigo-700 hover:bg-indigo-700 hover:text-white focus:ring-4 focus:outline-none font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                    <i class="fa-solid fa-cart-shopping"></i>
                </button>
            </div>
            {{-- <div class="px-3 py-4 w-full sm:w-auto flex items-center justify-between gap-2 lg:hidden text-right">
                <span>
                    {{ $product->price_currency }}
                    {{ $product->price }}
                </span>
                <button type="button"
                    class="lg:hidden text-indigo-700 border border-indigo-700 hover:bg-indigo-700 hover:text-white focus:ring-4 focus:outline-none font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
                    <i class="fa-solid fa-cart-shopping"></i>
                </button>
            </div> --}}
        </a>
        @endforeach
    </div>
    @endif
@endforeach

    <!-- Buy Modal -->
    <div x-data="fetchProductOrderView()">
        <template x-on:modal.window="productPrice = $event.detail.productPrice; url = $event.detail.url; modelOpen = $event.detail.modelOpen; fetchView();"></template>

        <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak @click="closeModal()" x-show="modelOpen"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                ></div>

                <div x-cloak x-show="modelOpen"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                >
                    <div class="flex items-center justify-between space-x-4">
                        <h1 class="text-xl font-medium text-gray-800 ">Buy Accounts</h1>
                        <button @click="closeModal()" class="text-gray-600 focus:outline-none hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>

                    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-700">

                    <form class="mt-4" method="post" action="{{ route('place.order') }}">
                        @csrf
                        <div class="modal-body" x-html="renderedHtml">
                            <div class="py-4 text-center overflow-y-auto">
                                <div class="flex animate-pulse">
                                    <div class="w-full">
                                        <h3 class="h-4 bg-gray-200 rounded-none dark:bg-gray-700" style="width: 50%;"></h3>
                                        <ul class="mt-5 space-y-3">
                                            <li class="w-full h-4 bg-gray-200 rounded-none dark:bg-gray-700"></li>
                                            <li class="w-full h-4 bg-gray-200 rounded-none dark:bg-gray-700"></li>
                                        </ul>
                                        <h3 class="mt-5 h-4 bg-gray-200 rounded-none dark:bg-gray-700" style="width: 50%;"></h3>
                                        <ul class="mt-5 space-y-3">
                                            <li class="w-full h-4 bg-gray-200 rounded-none dark:bg-gray-700"></li>
                                            <li class="w-full h-4 bg-gray-200 rounded-none dark:bg-gray-700"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex mt-6 items-center">
                            <label class="text-sm font-medium text-gray-900 dark:text-gray-300 me-24">
                                Price
                            </label>
                            &#36;
                            <span class="w-full" x-text="updatedPrice"></span>
                        </div>

                        <div class="mt-6 space-y-5">
                            <div class="flex items-center">
                                <input type="checkbox" name="toc" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" required>
                                <label for="checked-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    I agree to the <a href="{{ route('rules') }}" class="text-blue-600" target="_blank">Terms of Conditions</a>
                                </label>
                            </div>
                            <p class="text-gray-500">

                            </p>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-none dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                </svg>
                                <span class="ms-1">Proceed</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Buy Modal -->

{{-- </div> --}}
@endsection


@section('custom_scripts')
<script src="{{ asset('frontend/assets/js/buy-modal.js') }}"></script>
@endsection
