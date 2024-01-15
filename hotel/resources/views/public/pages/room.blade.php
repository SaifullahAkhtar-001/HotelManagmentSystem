<x-public-layout :website_settings="$website_settings">
    <div class="flex flex-col gap-4">
        <button type="button"  onclick="window.history.back()"
                class="max-md:hidden fixed top-8 left-4 flex items-center justify-center w-24 z-50 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border border-gray-200 rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
            <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
            </svg>
            <span>Go back</span>
        </button>
        <section class="flex flex-col h-fit gap-2">
            <div style="background-image: url('{{ asset($room->imggallery->where('is_hero', true)->first()->url) }}');"
                 class="bg-opacity-50 bg-cover bg-center h-[70vh] bg-stone-300 text-white">
                <div class="h-full pt-3 bg-black/30 backdrop-blur-sm">
                    <div class="h-[90vh] max-w-3xl mx-8 pt-[12vh] md:pt-[25vh] flex flex-col justify-start gap-4">
                        <h1 class="font-extrabold text-4xl text-gray-100">{{$room->name}} Room</h1>
                        <p class="text-lg font-light">{{$room->description}}</p>
                    </div>
                </div>
            </div>
            <div class="relative">
            <div  id='slider' class="w-full h-full overflow-x-scroll overflow-y-hidden scroll whitespace-nowrap scroll-smooth scrollbar-hide">
                <button onclick="slideLeft()" type="button" class="absolute top-[45%] left-4 rotate-180 z-40 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    <span class="sr-only">Icon description</span>
                </button>
                @foreach($room->imggallery as $image)
                        <img class="w-[320px] h-[28vh] object-cover object-center inline-block p-2 cursor-pointer hover:scale-105 ease-in-out duration-300"
                             src="{{$image->url}}" alt="not available">
                @endforeach
                <button onclick="slideRight()" type="button" class="absolute top-[45%] right-4 z-40 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    <span class="sr-only">Icon description</span>
                </button>
            </div>
            </div>
        </section>

        <section class="">
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                <div class="max-md:pb-8 md:hidden">
                    <img class="w-full h-96 rounded-lg object-cover object-center"
                         src="{{ asset($room->imggallery->first()->url) }}"
                         alt="office content 1">
                </div>
                <div class="font-light text-gray-500 sm:text-lg">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 ">We didn't
                        reinvent the wheel</h2>
                    <p class="mb-4">We are strategists, designers and developers. Innovators and problem solvers. Small
                        enough to be simple and quick, but big enough to deliver the scope you want at the pace you
                        need. Small enough to be simple and quick, but big enough to deliver the scope you want at the
                        pace you need.</p>
                    <p>We are strategists, designers and developers. Innovators and problem solvers. Small enough to be
                        simple and quick.</p>
                </div>
                <div class="max-md:hidden">
                    <img class="w-full h-96 rounded-lg object-cover object-center"
                         src="{{ asset($room->imggallery->first()->url) }}"
                         alt="office content 1">
                </div>
            </div>
        </section>

        <section class="">
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                <div class="pb-8">
                    <img class="w-full h-96 rounded-lg object-cover object-center"
                         src="{{ asset($room->imggallery->first()->url) }}"
                         alt="office content 1">
                </div>
                <div class="font-light text-gray-500 sm:text-lg">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 ">We didn't
                        reinvent the wheel</h2>
                    <p class="mb-4">We are strategists, designers and developers. Innovators and problem solvers. Small
                        enough to be simple and quick, but big enough to deliver the scope you want at the pace you
                        need. Small enough to be simple and quick, but big enough to deliver the scope you want at the
                        pace you need.</p>
                    <p>We are strategists, designers and developers. Innovators and problem solvers. Small enough to be
                        simple and quick.</p>
                </div>
            </div>
        </section>
    </div>
</x-public-layout>
