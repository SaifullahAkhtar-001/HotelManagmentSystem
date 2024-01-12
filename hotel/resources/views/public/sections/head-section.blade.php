 <div id="home" class="relative bg-opacity-50 bg-cover h-[100vh] bg-stone-300 text-white"
             style="background-image: url('{{ asset($hotel->imggallery->where('is_hero', true)->first()->url) }}');">
            <div class="h-full pt-3 backdrop-blur-sm">
                <div class="h-fit max-w-6xl pt-[25vh] mx-auto flex flex-col max-md:mx-4 items-center gap-6 text-center">
                    <p class="text-xl font-light">Welcome To</p>
                    <hr class="w-12 hr-color">
                    <h1 class="text-6xl mb-4">{{$hotel->hotel_name ? $hotel->hotel_name : "Hotel Name"}}</h1>
                    <p class="text-lg font-light">{{$hotel->short_description ? $hotel->short_description : "hotel Description"}}
                    </p>
                    <hr class="w-24 hr-color">
                    <div class="sm:hidden">
                        <x-responsive-search/>
                    </div>
                </div>

                <div
                    class="w-full absolute bottom-0 max-sm:hidden {{ $website_settings->show_booking_filter ? '' : 'hidden' }}">
                    @include('components.search-room')
                </div>
            </div>
        </div>

