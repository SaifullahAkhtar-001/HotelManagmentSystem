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
                        <div class="flex items-center ps-3">
                            <input id="nav_layout" type="radio" value="1" name="nav_layout"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 cursor-pointer"
                                {{ $settings->nav_layout == 1 ? 'checked' : '' }}>
                            <label for="nav_layout" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Layout 1
                            </label>
                        </div>
                        <div
                            class="hover_im w-[1000px] bg-gray-400 backdrop-blur-2xl bg-opacity-20 p-2 border-2 rounded-xl">
                            <p class="text-sm font-light ">preview</p>
                            <x-nav nav_layout="1"/>
                        </div>
                    </li>
                    <li class="w-full im_wrapper shadow-md hover:shadow-xl transition-all rounded-lg ">
                        <div class="flex items-center ps-3">
                            <input id="nav_layout" type="radio" value="2" name="nav_layout"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 cursor-pointer"
                                {{ $settings->nav_layout == 2 ? 'checked' : '' }}>
                            <label for="nav_layout" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 "> Layout
                                2 </label>
                        </div>
                        <div
                            class="hover_im w-[1000px] bg-gray-400 backdrop-blur-2xl bg-opacity-20 p-2 border-2 rounded-xl">
                            <p class="text-sm font-light ">preview</p>
                            <x-nav nav_layout="2"/>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- show booking filter Layout Selection -->
            <div class="border-b-2 mb-4 py-4 ">
                <h3 class="mb-4 font-bold">Select the booking filter layout</h3>
                <ul class="flex gap-2 w-fit text-sm font-medium text-gray-900 rounded-lg">
                    <li class="w-full im_wrapper rounded-lg hover:shadow-xl transition-all shadow-md">
                        <div class="flex items-center ps-3 pe-3">
                            <input id="booking_filter_layout" type="radio" value="1" name="booking_filter_layout"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 cursor-pointer"
                                {{ $settings->booking_filter_layout == 1 ? 'checked' : '' }}>
                            <label for="booking_filter_layout"
                                   class="w-fit whitespace-nowrap py-3 ms-2 text-sm font-medium text-gray-900 ">Layout 1
                            </label>
                        </div>
                    </li>
                    <li class="w-full im_wrapper rounded-lg hover:shadow-xl transition-all shadow-md">
                        <div class="flex items-center ps-3 pe-3">
                            <input id="booking_filter_layout" type="radio" value="1" name="booking_filter_layout"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 cursor-pointer"
                                {{ $settings->booking_filter_layout == 2 ? 'checked' : '' }}> <label
                                for="booking_filter_layout"
                                class="w-fit whitespace-nowrap py-3 ms-2 text-sm font-medium text-gray-900 ">Layout 2
                            </label>
                        </div>
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
