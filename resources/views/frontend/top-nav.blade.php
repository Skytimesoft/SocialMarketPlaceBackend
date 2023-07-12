<div class="sticky top-0 border-b w-full z-[990]">
    <div class="bg-gray-700 text-slate-100">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex justify-between items-center px-4 xl:px-0 py-2">
                <div>
                    AccsMarket - Accounts store
                </div>
                <div class="hidden lg:flex items-center gap-5">
                    <a href="#" class="flex items-center gap-1">
                        <svg width="26" height="26" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="16" cy="16" r="14" fill="url(#a)" />
                            <path
                                d="M22.987 10.209c.124-.806-.642-1.441-1.358-1.127L7.365 15.345c-.514.225-.476 1.003.056 1.173l2.942.937c.562.179 1.17.086 1.66-.253l6.632-4.582c.2-.138.418.147.247.323l-4.774 4.922c-.463.477-.371 1.286.186 1.636l5.345 3.351c.6.376 1.37-.001 1.483-.726l1.845-11.917Z"
                                fill="#fff" />
                            <defs>
                                <linearGradient id="a" x1="16" y1="2" x2="16" y2="30" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#37BBFE" />
                                    <stop offset="1" stop-color="#007DBB" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <span class="text-white">@accsmarket</span>
                    </a>
                    <a x-show="token!==null || token!== ''" href="/user" class="flex items-center gap-1" style="display: none">
                        <i class="fa-duotone fa-user"></i>
                        Your Account
                    </a>
                    <div x-show="token==null || token==''" class="flex items-center gap-2" style="display: none">
                        <button x-on:click="toggleSignUp" class="flex border items-center px-3 rounded gap-1 hover:border-indigo-500 hover:text-indigo-300">
                            + Sign Up
                        </button>
                        <button x-on:click="signInDialougOpen=true" class="flex border items-center px-3 rounded bg-indigo-500 border-indigo-500 text-white gap-1">
                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                <path d="M4.9995 4.63768C6.28016 4.63768 7.31835 3.5995 7.31835 2.31884C7.31835 1.03818 6.28016 0 4.9995 0C3.71884 0 2.68066 1.03818 2.68066 2.31884C2.68066 3.5995 3.71884 4.63768 4.9995 4.63768Z" fill="white"></path>
                                <path d="M4.99977 5.79712C2.67858 5.79712 0.796875 7.67882 0.796875 10H9.20267C9.20267 7.67882 7.32097 5.79712 4.99977 5.79712Z" fill="white"></path>
                            </svg>
                            Login
                        </button>
                    </div>
                    <div class="flex items-center gap-4 bg-slate-800 rounded py-1 px-4">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                style="enable-background:new 0 0 512 512" xml:space="preserve" width="20" height="20">
                                <path style="fill:#9b4166"
                                    d="M18.502 3.448H1.498A1.498 1.498 0 0 0 0 4.946v10.108c0 0.827 0.671 1.498 1.498 1.498h17.005A1.498 1.498 0 0 0 20 15.054V4.946a1.498 1.498 0 0 0 -1.498 -1.498z" />
                                <path style="fill:#f5f5f5"
                                    d="M19.979 4.698a1.498 1.498 0 0 0 -1.477 -1.25h-0.39l-6.388 4.185V3.448h-3.448v4.185L1.888 3.448h-0.39c-0.743 0 -1.359 0.541 -1.477 1.25l5.46 3.578H0v3.448h5.481l-5.46 3.577a1.498 1.498 0 0 0 1.477 1.25h0.39l6.388 -4.185v4.185h3.448v-4.185l6.388 4.185h0.39c0.743 0 1.359 -0.541 1.477 -1.25l-5.46 -3.578H20v-3.448h-5.481l5.46 -3.577z" />
                                <path style="fill:#ff4b55"
                                    d="M11.035 3.448h-2.069v5.517H0v2.069h8.965v5.517h2.069v-5.517H20v-2.069H11.035z" />
                                <path style="fill:#ff4b55"
                                    d="m0.968 16.455 7.288 -4.731H6.99L0.36 16.028a1.5 1.5 0 0 0 0.608 0.428zm12.562 -4.731h-1.267l7.059 4.582a1.505 1.505 0 0 0 0.48 -0.511l-6.272 -4.072zM0.158 4.276l6.162 3.999h1.267L0.605 3.744a1.504 1.504 0 0 0 -0.446 0.532zm12.833 3.999 6.642 -4.312a1.5 1.5 0 0 0 -0.613 -0.424l-7.297 4.736h1.267z" />
                            </svg>
                            Eng
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                style="enable-background:new 0 0 512 512" xml:space="preserve" width="20" height="20">
                                <path style="fill:#41479b"
                                    d="M18.502 3.448H1.498A1.498 1.498 0 0 0 0 4.946v10.108c0 0.827 0.671 1.498 1.498 1.498h17.005A1.498 1.498 0 0 0 20 15.054V4.946a1.498 1.498 0 0 0 -1.498 -1.498z" />
                                <path style="fill:#f5f5f5"
                                    d="M19.979 4.698a1.498 1.498 0 0 0 -1.477 -1.25h-0.39l-6.388 4.185V3.448h-3.448v4.185L1.888 3.448h-0.39c-0.743 0 -1.359 0.541 -1.477 1.25l5.46 3.578H0v3.448h5.481l-5.46 3.577a1.498 1.498 0 0 0 1.477 1.25h0.39l6.388 -4.185v4.185h3.448v-4.185l6.388 4.185h0.39c0.743 0 1.359 -0.541 1.477 -1.25l-5.46 -3.578H20v-3.448h-5.481l5.46 -3.577z" />
                                <path style="fill:#ff4b55"
                                    d="M11.035 3.448h-2.069v5.517H0v2.069h8.965v5.517h2.069v-5.517H20v-2.069H11.035z" />
                                <path style="fill:#ff4b55"
                                    d="m0.968 16.455 7.288 -4.731H6.99L0.36 16.028a1.5 1.5 0 0 0 0.608 0.428zm12.562 -4.731h-1.267l7.059 4.582a1.505 1.505 0 0 0 0.48 -0.511l-6.272 -4.072zM0.158 4.276l6.162 3.999h1.267L0.605 3.744a1.504 1.504 0 0 0 -0.446 0.532zm12.833 3.999 6.642 -4.312a1.5 1.5 0 0 0 -0.613 -0.424l-7.297 4.736h1.267z" />
                            </svg>
                            Pyc
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3 lg:hidden">
                    <router-link to="/user" class="block py-1 px-3 text-center text-2xl rounded bg-slate-100/20">
                        <i class="fa-duotone fa-user"></i>
                    </router-link>
                    <!-- <button class="py-1 px-3 text-center text-2xl rounded">
                        <i class="fa-regular fa-bars"></i>
                    </button> -->
                </div>
            </div>
        </div>
    </div>
    
    @include('frontend.components.login-logout')
    
    <div class="bg-slate-50 shadow hidden lg:block">
        <div class="max-w-screen-xl mx-auto">
            <div class="flex justify-between px-4 xl:px-0">
                <div class="flex items-center gap-1">
                    <i class="fa-regular fa-circle-info"></i> New ticket / Ask a question
                </div>
                <div class="flex items-center">
                    <a href="/" exact-active-class="!border-indigo-500"
                        class="flex items-center gap-1 border-b-2 border-transparent hover:border-indigo-500 px-4 py-3">
                        Home
                    </a>
                    <a href="/faq" exact-active-class="!border-indigo-500"
                        class="flex items-center gap-1 border-b-2 border-transparent hover:border-indigo-500 px-4 py-3">
                        FAQ
                    </a>
                    <div class="relative group/navHover cursor-pointer">
                        <div
                            class="flex items-center gap-1 border-b-2 border-transparent hover:border-indigo-500 px-4 py-3">
                            Information
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="hidden p-2 group-hover/navHover:block absolute bg-white min-w-[300px] right-0 top-full shadow-xl divide-y rounded-md overflow-hidden">
                            <a href="/recommendations" class="block py-2 px-4 hover:bg-indigo-500 hover:text-white rounded-md">
                                Accounts Guidelines
                            </a>
                            <a href="/selection" class="block py-2 px-4 hover:bg-indigo-500 hover:text-white rounded-md">
                                Software and Services
                            </a>
                        </div>
                    </div>
                    <a href="/rules"
                        class="flex items-center gap-1 border-b-2 border-transparent hover:border-indigo-500 px-4 py-3">
                        Terms of use
                    </a>
                    <a href="#"
                        class="flex items-center gap-2 py-2 px-4 bg-indigo-600 text-white hover:bg-indigo-700 rounded">
                        <i class="fa-regular fa-bags-shopping"></i>
                        Become a seller
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>