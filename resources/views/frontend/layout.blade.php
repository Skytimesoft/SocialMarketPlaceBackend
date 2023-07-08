<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Social Marketplace</title>
        <link rel="stylesheet" href="{{ asset('frontend/app.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/font-awesome/css/all.css') }}">
        
    </head>
    <body class="h-full bg-[#F3F3F3]" x-data="dropdown">
        @include('frontend.top-nav')

        <div class="py-3 px-4 xl:px-0">
            <div class="max-w-screen-xl mx-auto flex-col sm:flex-row flex justify-between mt-7 gap-5">
                <div class="relative">
                    <button x-on:click="categoryDropOpen=!categoryDropOpen" class="rounded-md w-full sm:w-auto py-2 dark:bg-red-300 px-5 bg-indigo-500 hover:bg-indigo-600 text-white flex justify-between items-center gap-2">
                        Select Categories
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                            </path>
                        </svg>
                    </button>
                    <div x-show="categoryDropOpen" @click.outside="categoryDropOpen=false" class="mt-2 divide-y divide-slate-200 absolute w-full z-10 bg-white shadow-2xl shadow-black/5 ring-1 ring-slate-700/10"  style="display: none;">
                        <div class="relative group">
                            <div class="flex px-3 py-2 justify-between items-center group-hover:bg-indigo-600 group-hover:text-white cursor-pointer transition-all duration-200">
                                <div class="flex items-center gap-2">
                                    <i class="fa-brands fa-facebook"></i>
                                    Wade Cooper
                                </div>
                                <svg class="w-5 h-5 -rotate-90" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                                    </path>
                                </svg>
                            </div>
                            <div class="absolute hidden group-hover:block left-full top-0 bg-white w-full border-l">
                                <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                                    Arlene Mccoy
                                </div>
                                <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                                    Arlene Mccoy
                                </div>
                                <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                                    Arlene Mccoy
                                </div>
                                <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                                    Arlene Mccoy
                                </div>
                            </div>
                        </div>
                        <div class="relative group">
                            <div class="flex px-3 py-2 justify-between items-center group-hover:bg-indigo-600 group-hover:text-white cursor-pointer transition-all duration-200">
                                <div class="flex items-center gap-2">
                                    <i class="fa-brands fa-twitter"></i>
                                    Wade Cooper
                                </div>
                                <svg class="w-5 h-5 -rotate-90" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                                    </path>
                                </svg>
                            </div>
                            <div class="absolute hidden group-hover:block left-full top-0 bg-white w-full border-l">
                                <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                                    Arlene Mccoy
                                </div>
                                <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                                    Arlene Mccoy
                                </div>
                                <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                                    Arlene Mccoy
                                </div>
                                <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                                    Arlene Mccoy
                                </div>
                            </div>
                        </div>
                        <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                            <div class="flex items-center gap-2">
                                <i class="fa-brands fa-instagram"></i>
                                Tom Cook
                            </div>
                        </div>
                        <div class="px-3 py-2 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all duration-200">
                            <div class="flex items-center gap-2">
                                <i class="fa-brands fa-telegram"></i>
                                Devon Webb
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 flex justify-end">
                    <input type="search" placeholder="Search"
                        class="rounded border-1 transition-all duration-200 sm:max-w-[500px] w-full">
                </div>
            </div>
        </div>

        @yield('content')

        <footer class="bg-white dark:bg-gray-900 mt-2">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0"> 
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Logo</span>
                    </a>
                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">Contact</a>
                        </li>
                    </ul>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                        href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
            </div>
        </footer>
        
        <script src="//unpkg.com/alpinejs" defer></script>
        <script>
            document.addEventListener('alpine:init', () => {
                console.log('init done');
                let token = localStorage.getItem('d-user-token');
                Alpine.data('dropdown', () => ({
                    categoryDropOpen: false,
                    signUpDialougOpen: false,
                    token: token,
                    signup: {
                        name: '',
                        email: '',
                        password: '',
                        password_confirmation: '',
                        user_type: 'Buyer',
                    },
                    toggleSignUp() {
                        this.signUpDialougOpen = ! this.signUpDialougOpen 
                    },
                    handleLogin() {
                        // console.log(JSON.stringify(this.signup));
                        const response = fetch(`{{ url('/api/register') }}`, {
                            method: "POST", // *GET, POST, PUT, DELETE, etc.
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(this.signup), // body data type must match "Content-Type" header
                        }).then(res => res.json())
                        .then(result => {
                            if (result?.data?.access_token) {
                                localStorage.setItem('d-user-token', result?.data?.access_token)
                                localStorage.setItem('d-user-info', result?.data?.user)
                                location.href = `{{ url('/user') }}`
                            }
                        })

                    },
                }))
            })
        </script>
    </body>
</html>
