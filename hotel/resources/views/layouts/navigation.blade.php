<nav class="md:fixed relative md:top-0 md:left-0 p-2 md:bottom-0 flex flex-col md:flex-row md:min-h-screen">
    <div @click.away="open = false"
         class="flex flex-col md:w-56 p-2 rounded-2xl shadow-xl text-gray-700 bg-white flex-shrink-0"
         x-data="{ open: false }">
        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
            <a href="{{route('admin.dashboard')}}"
               class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">Dashboard</a>
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
            <a href="{{route('admin.dashboard')}}"
               class="font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 font-bold' : '' }} flex items-end gap-2 px-4 py-2 mt-2 text-sm text-gray-900 rounded-lg   focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.25 11.9999L11.204 3.04495C11.644 2.60595 12.356 2.60595 12.795 3.04495L21.75 11.9999M4.5 9.74995V19.8749C4.5 20.4959 5.004 20.9999 5.625 20.9999H9.75V16.1249C9.75 15.5039 10.254 14.9999 10.875 14.9999H13.125C13.746 14.9999 14.25 15.5039 14.25 16.1249V20.9999H18.375C18.996 20.9999 19.5 20.4959 19.5 19.8749V9.74995M8.25 20.9999H16.5"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <span class="">Dashboard</span>
            </a>
            <a href="#"
               class="flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.862 4.487L18.549 2.799C18.9007 2.44733 19.3777 2.24976 19.875 2.24976C20.3723 2.24976 20.8493 2.44733 21.201 2.799C21.5527 3.15068 21.7502 3.62766 21.7502 4.125C21.7502 4.62235 21.5527 5.09933 21.201 5.451L10.582 16.07C10.0533 16.5984 9.40137 16.9867 8.685 17.2L6 18L6.8 15.315C7.01328 14.5986 7.40163 13.9467 7.93 13.418L16.862 4.487ZM16.862 4.487L19.5 7.125M18 14V18.75C18 19.3467 17.7629 19.919 17.341 20.341C16.919 20.763 16.3467 21 15.75 21H5.25C4.65326 21 4.08097 20.763 3.65901 20.341C3.23705 19.919 3 19.3467 3 18.75V8.25C3 7.65327 3.23705 7.08097 3.65901 6.65901C4.08097 6.23706 4.65326 6 5.25 6H10"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <span class="">Front Desk</span>
            </a>
            <a href="#"
               class="flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.35 3.836C11.285 4.046 11.25 4.269 11.25 4.5C11.25 4.914 11.586 5.25 12 5.25H16.5C16.6989 5.25 16.8897 5.17098 17.0303 5.03033C17.171 4.88968 17.25 4.69891 17.25 4.5C17.2501 4.27491 17.2164 4.05109 17.15 3.836M11.35 3.836C11.492 3.3767 11.7774 2.97493 12.1643 2.68954C12.5511 2.40414 13.0192 2.25011 13.5 2.25H15C16.012 2.25 16.867 2.918 17.15 3.836M11.35 3.836C10.974 3.859 10.6 3.886 10.226 3.916C9.095 4.01 8.25 4.973 8.25 6.108V8.25M17.15 3.836C17.526 3.859 17.9 3.886 18.274 3.916C19.405 4.01 20.25 4.973 20.25 6.108V16.5C20.25 17.0967 20.0129 17.669 19.591 18.091C19.169 18.5129 18.5967 18.75 18 18.75H15.75M8.25 8.25H4.875C4.254 8.25 3.75 8.754 3.75 9.375V20.625C3.75 21.246 4.254 21.75 4.875 21.75H14.625C15.246 21.75 15.75 21.246 15.75 20.625V18.75M8.25 8.25H14.625C15.246 8.25 15.75 8.754 15.75 9.375V18.75M7.5 15.75L9 17.25L12 13.5"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <span class="">Guest</span>
            </a>
            <a href="{{route('admin.rooms.index')}}"
               class="{{ request()->is('admin/rooms*') ? 'bg-gray-200 font-bold' : '' }} flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg  focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
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

                <span>Rooms</span>
            </a>
            <a href="{{route('admin.roomtype.index')}}"
               class="{{ request()->is('admin/roomtype*') ? 'bg-gray-200 font-bold' : '' }} flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg  focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
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

                <span>Room Type</span>
            </a>
            <a href="{{route('admin.facility.index')}}"
               class="{{ request()->is('admin/facility*') ? 'bg-gray-200 font-bold' : '' }} flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.568 3H5.25C4.65326 3 4.08097 3.23705 3.65901 3.65901C3.23705 4.08097 3 4.65326 3 5.25V9.568C3 10.165 3.237 10.738 3.659 11.159L13.24 20.74C13.939 21.439 15.02 21.612 15.847 21.07C17.9286 19.7066 19.7066 17.9286 21.07 15.847C21.612 15.02 21.439 13.939 20.74 13.24L11.16 3.66C10.951 3.45077 10.7029 3.28478 10.4297 3.17154C10.1565 3.05829 9.86371 3 9.568 3Z"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 6H6.008V6.008H6V6Z" stroke="#5D6679" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
                <span class="">Facilities</span>
            </a>
            <a href="{{route('admin.hotels.index')}}"
               class="{{ request()->is('admin/hotels*') ? 'bg-gray-200 font-bold' : '' }} flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg  focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M3.75 21H20.25M4.5 3H19.5M5.25 3V21M18.75 3V21M9 6.75H10.5M9 9.75H10.5M9 12.75H10.5M13.5 6.75H15M13.5 9.75H15M13.5 12.75H15M9 21V17.625C9 17.004 9.504 16.5 10.125 16.5H13.875C14.496 16.5 15 17.004 15 17.625V21"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Hotels</span>
            </a>
            <a href="{{route('admin.item.index')}}"
               class="{{ request()->is('admin/item*') ? 'bg-gray-200 font-bold' : '' }} flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg  focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg version="1.1" id="Capa_1" width="24" height="24" class="fill-gray-500"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 473.8 473.8" xml:space="preserve">
                <g>
                    <path d="M454.8,111.7c0-1.8-0.4-3.6-1.2-5.3c-1.6-3.4-4.7-5.7-8.1-6.4L241.8,1.2c-3.3-1.6-7.2-1.6-10.5,0L25.6,100.9
                        c-4,1.9-6.6,5.9-6.8,10.4v0.1c0,0.1,0,0.2,0,0.4V362c0,4.6,2.6,8.8,6.8,10.8l205.7,99.7c0.1,0,0.1,0,0.2,0.1
                        c0.3,0.1,0.6,0.2,0.9,0.4c0.1,0,0.2,0.1,0.4,0.1c0.3,0.1,0.6,0.2,0.9,0.3c0.1,0,0.2,0.1,0.3,0.1c0.3,0.1,0.7,0.1,1,0.2
                        c0.1,0,0.2,0,0.3,0c0.4,0,0.9,0.1,1.3,0.1c0.4,0,0.9,0,1.3-0.1c0.1,0,0.2,0,0.3,0c0.3,0,0.7-0.1,1-0.2c0.1,0,0.2-0.1,0.3-0.1
                        c0.3-0.1,0.6-0.2,0.9-0.3c0.1,0,0.2-0.1,0.4-0.1c0.3-0.1,0.6-0.2,0.9-0.4c0.1,0,0.1,0,0.2-0.1l206.3-100c4.1-2,6.8-6.2,6.8-10.8
                        V112C454.8,111.9,454.8,111.8,454.8,111.7z M236.5,25.3l178.4,86.5l-65.7,31.9L170.8,57.2L236.5,25.3z M236.5,198.3L58.1,111.8
                        l85.2-41.3L321.7,157L236.5,198.3z M42.8,131.1l181.7,88.1v223.3L42.8,354.4V131.1z M248.5,442.5V219.2l85.3-41.4v58.4
                        c0,6.6,5.4,12,12,12s12-5.4,12-12v-70.1l73-35.4V354L248.5,442.5z"/>
                </g>
                </svg>
                <span>Inventory</span>
            </a>
            <a href="#"
               class="flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg  focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12 6V18M9 15.182L9.879 15.841C11.05 16.72 12.949 16.72 14.121 15.841C15.293 14.962 15.293 13.538 14.121 12.659C13.536 12.219 12.768 12 12 12C11.275 12 10.55 11.78 9.997 11.341C8.891 10.462 8.891 9.038 9.997 8.159C11.103 7.28 12.897 7.28 14.003 8.159L14.418 8.489M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12Z"
                        stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                <span class="">Rates</span>
            </a>
            <a href="{{route('admin.website-settings.index')}}"
               class="flex items-end gap-2 px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg  focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg fill="" width="24" height="24" class=" fill-gray-600 hover:fill-green-500 transition-all" version="1.1" id="Capa_1"
                     stroke="currentColor"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     viewBox="0 0 478.703 478.703" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M454.2,189.101l-33.6-5.7c-3.5-11.3-8-22.2-13.5-32.6l19.8-27.7c8.4-11.8,7.1-27.9-3.2-38.1l-29.8-29.8
                                c-5.6-5.6-13-8.7-20.9-8.7c-6.2,0-12.1,1.9-17.1,5.5l-27.8,19.8c-10.8-5.7-22.1-10.4-33.8-13.9l-5.6-33.2
                                c-2.4-14.3-14.7-24.7-29.2-24.7h-42.1c-14.5,0-26.8,10.4-29.2,24.7l-5.8,34c-11.2,3.5-22.1,8.1-32.5,13.7l-27.5-19.8
                                c-5-3.6-11-5.5-17.2-5.5c-7.9,0-15.4,3.1-20.9,8.7l-29.9,29.8c-10.2,10.2-11.6,26.3-3.2,38.1l20,28.1
                                c-5.5,10.5-9.9,21.4-13.3,32.7l-33.2,5.6c-14.3,2.4-24.7,14.7-24.7,29.2v42.1c0,14.5,10.4,26.8,24.7,29.2l34,5.8
                                c3.5,11.2,8.1,22.1,13.7,32.5l-19.7,27.4c-8.4,11.8-7.1,27.9,3.2,38.1l29.8,29.8c5.6,5.6,13,8.7,20.9,8.7c6.2,0,12.1-1.9,17.1-5.5
                                l28.1-20c10.1,5.3,20.7,9.6,31.6,13l5.6,33.6c2.4,14.3,14.7,24.7,29.2,24.7h42.2c14.5,0,26.8-10.4,29.2-24.7l5.7-33.6
                                c11.3-3.5,22.2-8,32.6-13.5l27.7,19.8c5,3.6,11,5.5,17.2,5.5l0,0c7.9,0,15.3-3.1,20.9-8.7l29.8-29.8c10.2-10.2,11.6-26.3,3.2-38.1
                                l-19.8-27.8c5.5-10.5,10.1-21.4,13.5-32.6l33.6-5.6c14.3-2.4,24.7-14.7,24.7-29.2v-42.1
                                C478.9,203.801,468.5,191.501,454.2,189.101z M451.9,260.401c0,1.3-0.9,2.4-2.2,2.6l-42,7c-5.3,0.9-9.5,4.8-10.8,9.9
                                c-3.8,14.7-9.6,28.8-17.4,41.9c-2.7,4.6-2.5,10.3,0.6,14.7l24.7,34.8c0.7,1,0.6,2.5-0.3,3.4l-29.8,29.8c-0.7,0.7-1.4,0.8-1.9,0.8
                                c-0.6,0-1.1-0.2-1.5-0.5l-34.7-24.7c-4.3-3.1-10.1-3.3-14.7-0.6c-13.1,7.8-27.2,13.6-41.9,17.4c-5.2,1.3-9.1,5.6-9.9,10.8l-7.1,42
                                c-0.2,1.3-1.3,2.2-2.6,2.2h-42.1c-1.3,0-2.4-0.9-2.6-2.2l-7-42c-0.9-5.3-4.8-9.5-9.9-10.8c-14.3-3.7-28.1-9.4-41-16.8
                                c-2.1-1.2-4.5-1.8-6.8-1.8c-2.7,0-5.5,0.8-7.8,2.5l-35,24.9c-0.5,0.3-1,0.5-1.5,0.5c-0.4,0-1.2-0.1-1.9-0.8l-29.8-29.8
                                c-0.9-0.9-1-2.3-0.3-3.4l24.6-34.5c3.1-4.4,3.3-10.2,0.6-14.8c-7.8-13-13.8-27.1-17.6-41.8c-1.4-5.1-5.6-9-10.8-9.9l-42.3-7.2
                                c-1.3-0.2-2.2-1.3-2.2-2.6v-42.1c0-1.3,0.9-2.4,2.2-2.6l41.7-7c5.3-0.9,9.6-4.8,10.9-10c3.7-14.7,9.4-28.9,17.1-42
                                c2.7-4.6,2.4-10.3-0.7-14.6l-24.9-35c-0.7-1-0.6-2.5,0.3-3.4l29.8-29.8c0.7-0.7,1.4-0.8,1.9-0.8c0.6,0,1.1,0.2,1.5,0.5l34.5,24.6
                                c4.4,3.1,10.2,3.3,14.8,0.6c13-7.8,27.1-13.8,41.8-17.6c5.1-1.4,9-5.6,9.9-10.8l7.2-42.3c0.2-1.3,1.3-2.2,2.6-2.2h42.1
                                c1.3,0,2.4,0.9,2.6,2.2l7,41.7c0.9,5.3,4.8,9.6,10,10.9c15.1,3.8,29.5,9.7,42.9,17.6c4.6,2.7,10.3,2.5,14.7-0.6l34.5-24.8
                                c0.5-0.3,1-0.5,1.5-0.5c0.4,0,1.2,0.1,1.9,0.8l29.8,29.8c0.9,0.9,1,2.3,0.3,3.4l-24.7,34.7c-3.1,4.3-3.3,10.1-0.6,14.7
                                c7.8,13.1,13.6,27.2,17.4,41.9c1.3,5.2,5.6,9.1,10.8,9.9l42,7.1c1.3,0.2,2.2,1.3,2.2,2.6v42.1H451.9z"/>
                            <path d="M239.4,136.001c-57,0-103.3,46.3-103.3,103.3s46.3,103.3,103.3,103.3s103.3-46.3,103.3-103.3S296.4,136.001,239.4,136.001
                                z M239.4,315.601c-42.1,0-76.3-34.2-76.3-76.3s34.2-76.3,76.3-76.3s76.3,34.2,76.3,76.3S281.5,315.601,239.4,315.601z"/>
                        </g>
                    </g>
                </svg>

                <span class="whitespace-nowrap">Website Settings</span>
            </a>

            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:block   focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Profiles</span>
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
                    <div class="px-2 py-2 bg-white rounded-md shadow ">
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="{{route('admin.users.index')}}">Users</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="#">Link #2</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                           href="#">Link #3</a>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a
                    href="{{route('logout')}}"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();"
                    class="md:absolute flex gap-2 items-center cursor-pointer bottom-4 left-2 px-4 py-2 m-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">

                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.75 6.01624C15.75 7.0108 15.3549 7.96462 14.6516 8.66789C13.9484 9.37115 12.9945 9.76624 12 9.76624C11.0054 9.76624 10.0516 9.37115 9.34833 8.66789C8.64506 7.96462 8.24998 7.0108 8.24998 6.01624C8.24998 5.02167 8.64506 4.06785 9.34833 3.36458C10.0516 2.66132 11.0054 2.26624 12 2.26624C12.9945 2.26624 13.9484 2.66132 14.6516 3.36458C15.3549 4.06785 15.75 5.02167 15.75 6.01624ZM4.50098 20.1342C4.53311 18.1666 5.33731 16.2904 6.74015 14.9103C8.14299 13.5302 10.0321 12.7567 12 12.7567C13.9679 12.7567 15.857 13.5302 17.2598 14.9103C18.6626 16.2904 19.4668 18.1666 19.499 20.1342C17.1464 21.213 14.5881 21.7697 12 21.7662C9.32398 21.7662 6.78398 21.1822 4.50098 20.1342Z"
                            stroke="#5D6679" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Logout
                </a>
            </form>
        </nav>
    </div>
</nav>
