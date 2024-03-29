<x-app-layout>
    <x-form.header title="Website Settings" subTitle="Here You Will Configure Your Website!"/>
    <div class="max-h-56 max-w-xl">
    </div>
    @if($settings)
    <form method="post">
        @csrf
        <div class="flex flex-col gap-6">
            <!-- General Settings -->
            <x-website_settings.block-wrapper title="General Settings">
                <div class="flex gap-4">
                    <!-- Button Color Selection -->
                    <x-website_settings.color-selector name="button" :settings="$settings"/>
                    <!-- Divider Color Selection -->
                    <x-website_settings.color-selector name="hr" :settings="$settings"/>
                    <!-- H1 Color Selection -->
                    <x-website_settings.color-selector name="h1" :settings="$settings"/>
                    <!-- H2 Color Selection -->
                    <x-website_settings.color-selector name="h2" :settings="$settings"/>
                    <!-- H3 Color Selection -->
                    <x-website_settings.color-selector name="h3" :settings="$settings"/>
                    <!-- Text Color Selection -->
                    <x-website_settings.color-selector name="text" :settings="$settings"/>
                </div>

            </x-website_settings.block-wrapper>

            <!-- Hero Section Settings -->
            <x-website_settings.block-wrapper title="Hero Section Settings">
                <!-- Navbar Layout Selection -->
                <div class="border-b-2 mb-4 py-4 ">
                    <h3 class="mb-4 font-bold">Select the navbar layout</h3>
                    <ul class="flex gap-2 w-56 text-sm font-medium text-gray-900  rounded-lg">
                        <li class="w-full im_wrapper rounded-lg hover:shadow-xl transition-all shadow-md">
                            <x-website_settings.list-item value="1" label="Layout 1" name="nav_layout"
                                                          :settings="$settings"
                                                          :checker="$settings->nav_layout == 1 ? 'checked' : ''"/>
                            <x-website_settings.preview>
                                <x-nav nav_layout="1" cus_class="1"/>
                            </x-website_settings.preview>
                        </li>
                        <li class="w-full im_wrapper shadow-md hover:shadow-xl transition-all rounded-lg ">
                            <x-website_settings.list-item value="2" label="Layout 2" name="nav_layout"
                                                          :settings="$settings"
                                                          :checker="$settings->nav_layout == 2 ? 'checked' : ''"/>
                            <x-website_settings.preview>
                                <x-nav nav_layout="2" cus_class="1"/>
                            </x-website_settings.preview>
                        </li>
                    </ul>
                </div>

                <!-- select the hero section image -->
                <div class="flex flex-col gap-2 py-3 border-b-2 mb-4">
                    <div class="font-semibold">Select the Hero Section Image</div>
                    @if($hotel->imggallery->count() > 0)
                        <div class="flex">
                            <div class="grid grid-cols-5 max-lg:grid-cols-1 gap-4 w-fit">
                                @foreach($hotel->imggallery as $img)
                                    <x-website_settings.image-radio name="hotel_{{$hotel->id}}" :img="$img"
                                                                    :settings="$settings"/>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="flex items-center justify-center w-full h-36 bg-gray-100">
                            <div class="text-gray-500">No Images Found</div>
                        </div>
                    @endif
                </div>

                <!-- Show Booking Filters Checkbox -->
                <div class="flex flex-col gap-2 py-3 border-b-2 mb-4">
                    <div class="font-bold">Show Booking Filters</div>
                    <label for="show_booking_filter">
                        <input {{ $settings->show_booking_filter ? 'checked' : '' }} id="show_booking_filter"
                               name="show_booking_filter" type="checkbox" value="1"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
                    </label>
                </div>

                <!-- show booking filter Layout Selection -->
                <div class="{{ $settings->show_booking_filter ? '' : 'hidden'  }} border-b-2 mb-4 py-4 ">
                    <h3 class="mb-4 font-bold">Select the booking filter layout</h3>
                    <ul class="flex gap-2 w-fit text-sm font-medium text-gray-900 rounded-lg">
                        <li class="w-full im_wrapper rounded-lg hover:shadow-xl transition-all shadow-md">
                            <x-website_settings.list-item value="1" label="Layout 1" name="booking_filter_layout"
                                                          :settings="$settings"
                                                          :checker="$settings->booking_filter_layout == 1 ? 'checked' : ''"/>
                            <x-website_settings.preview>
                                <x-layout.room-filter-layout-1/>
                            </x-website_settings.preview>
                        </li>
                        <li class="w-full im_wrapper rounded-lg hover:shadow-xl transition-all shadow-md">
                            <x-website_settings.list-item value="2" label="Layout 2" name="booking_filter_layout"
                                                          :settings="$settings"
                                                          :checker="$settings->booking_filter_layout == 2 ? 'checked' : ''"/>
                            <x-website_settings.preview>
                                <x-layout.room-filter-layout-2/>
                            </x-website_settings.preview>
                        </li>
                    </ul>
                </div>
            </x-website_settings.block-wrapper>

            <!-- Interior Section Settings -->
            <x-website_settings.block-wrapper title="Interior Section Settings">
                <!-- show interior section -->
                <div class="flex flex-col gap-2 py-3 border-b-2 mb-4">
                    <div class="font-bold">Show Interior Section</div>
                    <label for="show_interior">
                        <input {{ $settings->show_interior ? 'checked' : '' }} id="show_interior"
                               name="show_interior" type="checkbox" value="1"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
                    </label>
                </div>
                <div class="border-b-2 mb-4 py-4 ">
                    <h3 class="mb-4 font-bold">Select the Interior Image Showcase Format</h3>
                    <ul class="flex gap-2 w-56 text-sm font-medium text-gray-900  rounded-lg">
                        <li class="w-full im_wrapper rounded-lg hover:shadow-xl transition-all shadow-md">
                            <x-website_settings.list-item value="carousal" label="Carousal"
                                                          name="interior_display_format" :settings="$settings"
                                                          :checker="$settings->interior_display_format == 'carousal' ? 'checked' : ''"/>
                        </li>
                        <li class="w-full im_wrapper shadow-md hover:shadow-xl transition-all rounded-lg ">
                            <x-website_settings.list-item value="gallery" label="Gallery" name="interior_display_format"
                                                          :settings="$settings"
                                                          :checker="$settings->interior_display_format == 'gallery' ? 'checked' : ''"/>
                        </li>
                    </ul>
                </div>
            </x-website_settings.block-wrapper>

            <!-- Amenities Section Settings -->
            <x-website_settings.block-wrapper title="Amenities Section Settings">
                <!-- show amenities section -->
                <div class="flex flex-col gap-2 py-3 border-b-2 mb-4">
                    <div class="font-bold">Show Amenities Section</div>
                    <label for="show_amenities">
                        <input {{ $settings->show_amenities ? 'checked' : '' }} id="show_interior"
                               name="show_amenities" type="checkbox" value="1"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
                    </label>
                </div>
            </x-website_settings.block-wrapper>

            <!-- Room Section Settings -->
            <x-website_settings.block-wrapper title="Room Section Settings">
                <!-- show room section -->
                @if($roomtypes->count() > 0)
                <div class="flex flex-col gap-2 py-3 border-b-2 mb-4">
                    <div class="font-bold">Show Room Section</div>
                    <label for="show_room">
                        <input {{ $settings->show_room ? 'checked' : '' }} id="show_room"
                               name="show_room" type="checkbox" value="1"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
                    </label>
                </div>
                @foreach($roomtypes as $roomtype)
                    <div class="flex flex-col gap-2 py-3 border-b-2 mb-4">
                        <div class="font-semibold">Select the {{$roomtype->name}} Room Hero Section Image</div>
                        @if($roomtype->imggallery->count() > 0)
                            <div class="flex">
                                <div class="grid grid-cols-5 max-lg:grid-cols-1 gap-4 w-fit">
                                    @foreach($roomtype->imggallery as $img)
                                        <x-website_settings.image-radio name="room_type_{{$roomtype->id}}" :img="$img"
                                                                        :settings="$settings"/>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="flex items-center justify-center w-full h-36 bg-gray-100">
                                <div class="text-gray-500">No Images Found</div>
                            </div>
                        @endif
                    </div>
                @endforeach
                @else
                    <div class="flex items-center justify-center w-full h-36 bg-gray-100">
                        <div class="text-gray-500">No Room Types Found</div>
                @endif
            </x-website_settings.block-wrapper>


            <!-- Submit Button -->
            <x-form.submit-button value="Save"/>
        </div>
    </form>
    @else
        <div class="flex gap-4 items-center ">
            <p class="text-red-500">No Hotel Found!</p>
            <a href="{{route('admin.hotels.create')}}" class="bg-blue-500 text-white px-3 py-2 rounded-lg">Create Hotel</a>
        </div>
    @endif

</x-app-layout>
