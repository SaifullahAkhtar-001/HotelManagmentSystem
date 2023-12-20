<x-app-layout>
    <form method="post">
        @csrf
        <div>
            <!-- Show Booking Filters Checkbox -->
            <div class="flex flex-col gap-2 py-3 border-b-2 mb-4">
                <div class="font-bold">Show Booking Filters</div>
                <label for="showBookingFilters">
                    <input {{ $settings->showBookingFilter ? 'checked' : '' }} id="showBookingFilters"
                        name="showBookingFilter" type="checkbox" value="1"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
                </label>
            </div>

            <!-- Button Color Selection -->
            <div class="flex flex-col gap-3 py-3 border-b-2 mb-4">
                <div class="font-bold">Select Button Color</div>
                <label>
                    <input type="color" value="{{ $settings->button_color }}" class="" name="button_color" />
                </label>

            </div>

            <!-- Navbar Layout Selection -->
            <div class="border-b-2 mb-4 py-4 ">
                <h3 class="mb-4 font-bold">Select the navbar layout</h3>
                <ul class="flex gap-2  w-48 text-sm font-medium text-gray-900  rounded-lg">
                    <li class="w-full rounded-lg hover:shadow-xl transition-all shadow-md">
                        <div class="flex im_wrapper items-center ps-3 whitespace-nowrap">
                            <input id="nav_layout" type="radio" value="1" name="nav_layout"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                                {{ $settings->nav_layout == 1 ? 'checked' : '' }}>
                            <label for="nav_layout" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 ">Layout 1
                            </label>
                            <div class="hover_im w-[1000px] bg-gray-400 p-2 border-2 rounded-xl"><p class="text-sm font-light ">preview</p><x-nav nav_layout="1"/></div>
                        </div>
                    </li>
                    <li class="im_wrapper w-full shadow-md hover:shadow-xl transition-all rounded-lg ">
                        <div class=" flex items-center ps-3">
                            <input id="nav_layout" type="radio" value="2" name="nav_layout"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300"
                                {{ $settings->nav_layout == 2 ? 'checked' : '' }}>
                            <label for="nav_layout" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 "> Layout
                                2 </label>
                            </div>
                            <div class="hover_im w-[1000px] bg-gray-400 p-2 border-2 rounded-xl"><p class="text-sm font-light ">preview</p><x-nav nav_layout="2"/></div>
                    </li>
                </ul>

            </div>

            <!-- Submit Button -->
            <x-submit-button value="Save" />
        </div>
    </form>
    <div class="max-h-56 max-w-xl" >
    </div>
</x-app-layout>


{{-- <div> --}}
{{--    <p class="font-semibold">Preview:</p> --}}
{{--    <div class="flex gap-4"> --}}
{{--        <div class="im_wrapper cursor-pointer text-blue-500 py-2 px-3 bg-gray-200 rounded-full"> --}}
{{--            <p>Layout 1</p> --}}
{{--            <div class="hover_im"><img class="max-h-56 max-w-4xl rounded shadow-2xl" src="{{ asset('images/nav_layout_1.png') }}" alt=""></div> --}}
{{--        </div> --}}
{{--        <div class="im_wrapper cursor-pointer text-blue-500 py-2 px-3 bg-gray-200 rounded-full"> --}}
{{--            <p>Layout 2</p> --}}
{{--            <div class="hover_im"><img class="max-h-56 max-w-4xl rounded shadow-2xl" src="{{ asset('images/nav_layout_2.png') }}" alt=""></div> --}}
{{--        </div> --}}
{{--    </div> --}}
{{-- </div> --}}
