<x-public-layout :website_settings="$website_settings">
    <div class="flex flex-col gap-4">
        <section class="flex flex-col h-fit gap-2">
            <div style="background-image: url('{{ asset($room->imggallery->first()->url) }}');"
                 class="bg-opacity-50 bg-cover bg-center h-[70vh] bg-stone-300 text-white">
                <div class="h-full pt-3 bg-black/30 backdrop-blur-sm">
                    <div class="h-[90vh] max-w-3xl mx-8 pt-[12vh] md:pt-[25vh] flex flex-col justify-start gap-4">
                        <div class="flex items-baseline gap-2">
                            <svg fill="none" version="1.1" id="Capa_1" class="h-6 w-6 fill-blue-500"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 viewBox="0 0 297 297" xml:space="preserve">
                            <g>
                                <path d="M148.5,0C87.43,0,37.747,49.703,37.747,110.797c0,91.026,99.729,179.905,103.976,183.645
                                    c1.936,1.705,4.356,2.559,6.777,2.559c2.421,0,4.841-0.853,6.778-2.559c4.245-3.739,103.975-92.618,103.975-183.645
                                    C259.253,49.703,209.57,0,148.5,0z M148.5,272.689c-22.049-21.366-90.243-93.029-90.243-161.892
                                    c0-49.784,40.483-90.287,90.243-90.287s90.243,40.503,90.243,90.287C238.743,179.659,170.549,251.322,148.5,272.689z"/>
                                <path d="M148.5,59.183c-28.273,0-51.274,23.154-51.274,51.614c0,28.461,23.001,51.614,51.274,51.614
                                    c28.273,0,51.274-23.153,51.274-51.614C199.774,82.337,176.773,59.183,148.5,59.183z M148.5,141.901
                                    c-16.964,0-30.765-13.953-30.765-31.104c0-17.15,13.801-31.104,30.765-31.104c16.964,0,30.765,13.953,30.765,31.104
                                    C179.265,127.948,165.464,141.901,148.5,141.901z"/>
                            </g>
                            </svg>
                            <p class="text-gray-300">{{$room->hotel->city}}</p>
                        </div>
                        <h1 class="font-extrabold text-4xl text-gray-100">{{$room->roomtype->name}} Room</h1>
                        <p class="text-lg font-light">{{$room->roomtype->description}}</p>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-5 gap-4 px-2">
                @foreach($room->roomtype->imggallery as $image)
                    <div class="relative overflow-hidden">
                        <img class="w-full h-[28vh] object-cover object-center rounded-lg"
                             src="{{$image->url}}" alt="not available">
                    </div>
                @endforeach
            </div>
        </section>

        <section class="">
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
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
                <div class="">
                    <img class="w-full h-96 rounded-lg object-cover object-center"
                         src="{{ asset($room->imggallery->first()->url) }}"
                         alt="office content 1">
                </div>
            </div>
        </section>

        <section class="">
            <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                <div class="">
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
