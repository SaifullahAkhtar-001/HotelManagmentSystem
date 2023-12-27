<x-app-layout>
    <x-form.header title="Website Settings" subTitle="Here You Will Configure Your Website!"/>
    <form method="post">
        @csrf
        <div>
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
                        <x-website_settings.list-item value="1" label="Layout 1" name="booking_filter_layout" :settings="$settings" :checker="$settings->booking_filter_layout == 1 ? 'checked' : ''" />
                        <x-website_settings.preview>
                            <x-layout.room-filter-layout-1/>
                        </x-website_settings.preview>
                    </li>
                    <li class="w-full im_wrapper rounded-lg hover:shadow-xl transition-all shadow-md">
                        <x-website_settings.list-item value="2" label="Layout 2" name="booking_filter_layout" :settings="$settings" :checker="$settings->booking_filter_layout == 2 ? 'checked' : ''" />
                        <x-website_settings.preview>
                            <x-layout.room-filter-layout-2/>
                        </x-website_settings.preview>
                    </li>
                </ul>
            </div>

            <!-- Button Color Selection -->
            <div class="flex flex-col gap-3 py-3 border-b-2 mb-4">
                <div class="font-bold">Select Button Color</div>
                <label>
                    <input type="color" value="{{ $settings->button_color }}" class="" name="button_color"/>
                </label>

            </div>

            <!-- Navbar Layout Selection -->
            <div class="border-b-2 mb-4 py-4 ">
                <h3 class="mb-4 font-bold">Select the navbar layout</h3>
                <ul class="flex gap-2 w-56 text-sm font-medium text-gray-900  rounded-lg">
                    <li class="w-full im_wrapper rounded-lg hover:shadow-xl transition-all shadow-md">
                        <x-website_settings.list-item value="1" label="Layout 1" name="nav_layout" :settings="$settings" :checker="$settings->nav_layout == 1 ? 'checked' : ''" />
                        <x-website_settings.preview>
                            <x-nav nav_layout="1"/>
                        </x-website_settings.preview>
                    </li>
                    <li class="w-full im_wrapper shadow-md hover:shadow-xl transition-all rounded-lg ">
                        <x-website_settings.list-item value="2" label="Layout 2" name="nav_layout" :settings="$settings" :checker="$settings->nav_layout == 2 ? 'checked' : ''" />
                        <x-website_settings.preview>
                            <x-nav nav_layout="2"/>
                        </x-website_settings.preview>
                    </li>
                </ul>
            </div>



            <!-- Submit Button -->
            <x-form.submit-button value="Save"/>
        </div>
    </form>
    <div class="max-h-56 max-w-xl">
    </div>
</x-app-layout>
