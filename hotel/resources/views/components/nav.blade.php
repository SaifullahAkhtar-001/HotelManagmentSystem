@props(['nav_layout' => 2 , 'cus_class'=>0])
@if($nav_layout == 1)
    <nav id="navbar" class="{{ $cus_class ? '' : 'fixed top-0 w-[100vw]' }} text-gray-100 z-30 bg-black/50 backdrop-blur-xl">
    <div class="flex justify-between items-center py-6  max-sm:mx-2 sm:max-w-6xl mx-auto">
        <a href="{{route('home')}}" class="md:text-4xl text-xl  hover:tracking-widest transition-all cursor-pointer">
            Hotel De Papea'
        </a>
        <div class="flex items-center justify-center gap-6">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="hover:font-bold transition-all">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="hover:font-bold transition-all">
                        Sign In
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:font-bold transition-all">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
            <li class="font-sans block lg:inline-block lg:mt-0 lg:ml-6 align-middle text-black hover:text-gray-700">
                <a href="#" role="button" class="relative flex">
                    <svg class="w-7 h-7" fill="white" viewbox="0 0 24 24">
                        <path
                            d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"/>
                    </svg>
                    <span
                        class="absolute right-0 top-0 rounded-full bg-red-600 w-4 h-4 top right p-0 m-0 text-white font-mono text-sm  leading-tight text-center">5
                    </span>
                </a>
            </li>
        </div>
    </div>
    </nav>
@elseif($nav_layout == 2)
    <nav id="navbar"
        class="{{ $cus_class ? '' : 'fixed top-4 left-1/2 transform -translate-x-1/2' }} z-30 mx-auto w-full max-w-screen-md bg-white/50 py-3 shadow-xl hover:shadow-2xl backdrop-blur-xl md:top-6 md:rounded-3xl lg:max-w-screen-lg">
        <div class="px-4">
            <div class="flex items-center justify-between">
                <div class="flex shrink-0">
                    <a aria-current="page" class="flex items-center" href="/">
                        <img class="h-7 rounded-full w-auto" src="{{asset('images/logo.jpg')}}" alt="">
                        <p class="sr-only">Website Title</p>
                    </a>
                </div>
                <div class="hidden md:flex md:items-center md:justify-center md:gap-5">
                    <a aria-current="page"
                       class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                       href="#">How it works</a>
                    <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                       href="#">Pricing</a>
                    <a class="inline-block rounded-lg px-2 py-1 text-sm font-medium text-gray-900 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                       href="#">About</a>
                </div>
                <div class="flex items-center justify-end gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                               href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a class="inline-flex items-center justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 transition-all duration-150 hover:bg-gray-50 sm:inline-flex"
                               href="{{ route('login') }}">Sign in</a>
                            @if (Route::has('register'))
                                <a class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                                   href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>
@endif
