{{--<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">--}}
{{--    <!-- Primary Navigation Menu -->--}}
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--        <div class="flex justify-between h-16">--}}
{{--            <div class="flex">--}}
{{--                <!-- Logo -->--}}
{{--                <div class="shrink-0 flex items-center">--}}
{{--                    <a href="{{ route('dashboard') }}">--}}
{{--                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <!-- Navigation Links -->--}}
{{--                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">--}}
{{--                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">--}}
{{--                        {{ __('Dashboard') }}--}}
{{--                    </x-nav-link>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Settings Dropdown -->--}}
{{--            <div class="hidden sm:flex sm:items-center sm:ms-6">--}}
{{--                <x-dropdown align="right" width="48">--}}
{{--                    <x-slot name="trigger">--}}
{{--                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">--}}
{{--                            <div>{{ Auth::user()->name }}</div>--}}

{{--                            <div class="ms-1">--}}
{{--                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </button>--}}
{{--                    </x-slot>--}}

{{--                    <x-slot name="content">--}}
{{--                        <x-dropdown-link :href="route('profile.edit')">--}}
{{--                            {{ __('Profile') }}--}}
{{--                        </x-dropdown-link>--}}

{{--                        <!-- Authentication -->--}}
{{--                        <form method="POST" action="{{ route('logout') }}">--}}
{{--                            @csrf--}}

{{--                            <x-dropdown-link :href="route('logout')"--}}
{{--                                    onclick="event.preventDefault();--}}
{{--                                                this.closest('form').submit();">--}}
{{--                                {{ __('Log Out') }}--}}
{{--                            </x-dropdown-link>--}}
{{--                        </form>--}}
{{--                    </x-slot>--}}
{{--                </x-dropdown>--}}
{{--            </div>--}}

{{--            <!-- Hamburger -->--}}
{{--            <div class="-me-2 flex items-center sm:hidden">--}}
{{--                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">--}}
{{--                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
{{--                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
{{--                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Responsive Navigation Menu -->--}}
{{--    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">--}}
{{--        <div class="pt-2 pb-3 space-y-1">--}}
{{--            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">--}}
{{--                {{ __('Dashboard') }}--}}
{{--            </x-responsive-nav-link>--}}
{{--        </div>--}}

{{--        <!-- Responsive Settings Options -->--}}
{{--        <div class="pt-4 pb-1 border-t border-gray-200">--}}
{{--            <div class="px-4">--}}
{{--                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>--}}
{{--                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
{{--            </div>--}}

{{--            <div class="mt-3 space-y-1">--}}
{{--                <x-responsive-nav-link :href="route('profile.edit')">--}}
{{--                    {{ __('Profile') }}--}}
{{--                </x-responsive-nav-link>--}}

{{--                <!-- Authentication -->--}}
{{--<form method="POST" action="{{ route('logout') }}">--}}
{{--    @csrf--}}

{{--    <x-responsive-nav-link :href="route('logout')"--}}
{{--                           onclick="event.preventDefault();--}}
{{--                                        this.closest('form').submit();">--}}
{{--        {{ __('Log Out') }}--}}
{{--    </x-responsive-nav-link>--}}
{{--</form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
<nav class="flex flex-col md:flex-row md:min-h-screen">
    <div @click.away="open = false"
         class="flex flex-col md:w-56 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
         x-data="{ open: false }">
        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
            <a href="#"
               class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Dashboard</a>
            <button class="rounded-lg md:hidden  focus:outline-none focus:shadow-outline"
                    @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'block': open, 'hidden': !open}"
             class="relative flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
            <div
                class="font-semibold {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-bold' : '' }} flex items-end gap-2 px-4 py-2 mt-2 text-sm text-gray-900 rounded-lg   focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.25 11.9999L11.204 3.04495C11.644 2.60595 12.356 2.60595 12.795 3.04495L21.75 11.9999M4.5 9.74995V19.8749C4.5 20.4959 5.004 20.9999 5.625 20.9999H9.75V16.1249C9.75 15.5039 10.254 14.9999 10.875 14.9999H13.125C13.746 14.9999 14.25 15.5039 14.25 16.1249V20.9999H18.375C18.996 20.9999 19.5 20.4959 19.5 19.8749V9.74995M8.25 20.9999H16.5"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <a class=""
                   href="{{route('dashboard')}}">Dashboard</a>
            </div>
            <div
                class="flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.862 4.487L18.549 2.799C18.9007 2.44733 19.3777 2.24976 19.875 2.24976C20.3723 2.24976 20.8493 2.44733 21.201 2.799C21.5527 3.15068 21.7502 3.62766 21.7502 4.125C21.7502 4.62235 21.5527 5.09933 21.201 5.451L10.582 16.07C10.0533 16.5984 9.40137 16.9867 8.685 17.2L6 18L6.8 15.315C7.01328 14.5986 7.40163 13.9467 7.93 13.418L16.862 4.487ZM16.862 4.487L19.5 7.125M18 14V18.75C18 19.3467 17.7629 19.919 17.341 20.341C16.919 20.763 16.3467 21 15.75 21H5.25C4.65326 21 4.08097 20.763 3.65901 20.341C3.23705 19.919 3 19.3467 3 18.75V8.25C3 7.65327 3.23705 7.08097 3.65901 6.65901C4.08097 6.23706 4.65326 6 5.25 6H10"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <a class=""
                   href="#">Front Desk</a>
            </div>
            <div
                class="flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.35 3.836C11.285 4.046 11.25 4.269 11.25 4.5C11.25 4.914 11.586 5.25 12 5.25H16.5C16.6989 5.25 16.8897 5.17098 17.0303 5.03033C17.171 4.88968 17.25 4.69891 17.25 4.5C17.2501 4.27491 17.2164 4.05109 17.15 3.836M11.35 3.836C11.492 3.3767 11.7774 2.97493 12.1643 2.68954C12.5511 2.40414 13.0192 2.25011 13.5 2.25H15C16.012 2.25 16.867 2.918 17.15 3.836M11.35 3.836C10.974 3.859 10.6 3.886 10.226 3.916C9.095 4.01 8.25 4.973 8.25 6.108V8.25M17.15 3.836C17.526 3.859 17.9 3.886 18.274 3.916C19.405 4.01 20.25 4.973 20.25 6.108V16.5C20.25 17.0967 20.0129 17.669 19.591 18.091C19.169 18.5129 18.5967 18.75 18 18.75H15.75M8.25 8.25H4.875C4.254 8.25 3.75 8.754 3.75 9.375V20.625C3.75 21.246 4.254 21.75 4.875 21.75H14.625C15.246 21.75 15.75 21.246 15.75 20.625V18.75M8.25 8.25H14.625C15.246 8.25 15.75 8.754 15.75 9.375V18.75M7.5 15.75L9 17.25L12 13.5"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <a class=""
                   href="#">Guest</a>
            </div>
            <div
                class="flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg  focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_226_8888)">
                        <path
                            d="M18.35 11.45V9C18.35 7.9 17.45 7 16.35 7H13C12.63 7 12.28 7.12 12 7.32C11.72 7.12 11.37 7 11 7H7.65C6.55 7 5.65 7.9 5.65 9V11.45C5.25 11.91 5 12.51 5 13.17V17H6.5V15.5H17.5V17H19V13.17C19 12.51 18.75 11.91 18.35 11.45ZM16.75 10.5H12.75V8.5H16.75V10.5ZM7.25 8.5H11.25V10.5H7.25V8.5ZM17.5 14H6.5V13C6.5 12.45 6.95 12 7.5 12H16.5C17.05 12 17.5 12.45 17.5 13V14ZM20 4V20H4V4H20ZM20 2H4C2.9 2 2 2.9 2 4V20C2 21.1 2.9 22 4 22H20C21.1 22 22 21.1 22 20V4C22 2.9 21.1 2 20 2Z"
                            fill="#5D6679"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_226_8888">
                            <rect width="24" height="24" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>

                <a class=""
                   href="#">Rooms</a>
            </div>
            <div
                class="flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg     focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.568 3H5.25C4.65326 3 4.08097 3.23705 3.65901 3.65901C3.23705 4.08097 3 4.65326 3 5.25V9.568C3 10.165 3.237 10.738 3.659 11.159L13.24 20.74C13.939 21.439 15.02 21.612 15.847 21.07C17.9286 19.7066 19.7066 17.9286 21.07 15.847C21.612 15.02 21.439 13.939 20.74 13.24L11.16 3.66C10.951 3.45077 10.7029 3.28478 10.4297 3.17154C10.1565 3.05829 9.86371 3 9.568 3Z"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 6H6.008V6.008H6V6Z" stroke="#5D6679" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>

                <a class=""
                   href="#">Rooms</a>
            </div>
            <div
                class="flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg     focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 6V18M9 15.182L9.879 15.841C11.05 16.72 12.949 16.72 14.121 15.841C15.293 14.962 15.293 13.538 14.121 12.659C13.536 12.219 12.768 12 12 12C11.275 12 10.55 11.78 9.997 11.341C8.891 10.462 8.891 9.038 9.997 8.159C11.103 7.28 12.897 7.28 14.003 8.159L14.418 8.489M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12Z"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <a class=""
                   href="#">Rates</a>
            </div>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:block   focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Settings</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                         class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                        <a class="font-semibold {{ request()->routeIs('hotelSettings') ? 'bg-gray-200 font-bold' : '' }} block px-4 py-2 mt-2 text-sm rounded-lg   md:mt-0   focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="{{ route('hotelSettings') }}">Hotel Settings</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="#">Link #2</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="#">Log Out</a>
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a
                    href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();"
                    class="absolute cursor-pointer block bottom-4 left-2 px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    Logout
                </a>
            </form>
        </nav>
    </div>
</nav>
