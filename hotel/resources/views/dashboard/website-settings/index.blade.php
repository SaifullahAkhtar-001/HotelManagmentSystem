<x-app-layout>
    <form method="post">
        @csrf
        <div>
            <!-- Show Booking Filters Checkbox -->
            <div class="flex flex-col gap-2 py-3 border-b-2 mb-4">
                <label for="showBookingFilter" class=" font-bold">Show Booking Filters</label>
                <input {{ $settings->showBookingFilter ? 'checked' : '' }} id="showBookingFilters"
                       name="showBookingFilter" type="checkbox" value="1"
                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
            </div>

            <!-- Button Color Selection -->
            <div class="flex flex-col gap-3 py-3 border-b-2 mb-4">
                <label class="font-bold">Select Button Color</label>
                <input type="color" value="{{ $settings->button_color }}" class="" name="button_color"/>

            </div>

            <!-- Navbar Layout Selection -->
            <div class="border-b-2 mb-4 flex flex-col py-3 gap-4">
                <label class="font-bold">Select Navbar Layout</label>
                <div>
                    <p class="font-semibold">Preview:</p>
                    <div class="flex gap-4">
                        <div class="im_wrapper cursor-pointer text-blue-500 py-2 px-3 bg-gray-200 rounded-full">
                            <p>Layout 1</p>
                            <div class="hover_im"><img class="max-h-56 max-w-4xl rounded shadow-2xl" src="{{ asset('images/nav_layout_1.png') }}" alt=""></div>
                        </div>
                        <div class="im_wrapper cursor-pointer text-blue-500 py-2 px-3 bg-gray-200 rounded-full">
                            <p>Layout 2</p>
                            <div class="hover_im"><img class="max-h-56 max-w-4xl rounded shadow-2xl" src="{{ asset('images/nav_layout_2.png') }}" alt=""></div>
                        </div>
                    </div>
                </div>
                <select name="nav_layout"
                        class="py-3 px-4 block w-32 border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <option value="1" class="hover:text-red-900" {{ $settings->nav_layout == 1 ? 'selected' : '' }}><p class="hover:text-red-900">Layout 1</p></option>
                    <option value="2" {{ $settings->nav_layout == 2 ? 'selected' : '' }}>Layout 2</option>
                </select>
            </div>

            <!-- Submit Button -->
            <x-submit-button value="Save"/>
        </div>
    </form>
</x-app-layout>
