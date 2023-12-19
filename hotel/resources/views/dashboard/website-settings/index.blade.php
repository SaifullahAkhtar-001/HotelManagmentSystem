<x-app-layout>
    <form method="post">
        @csrf
        <div class="flex items-center mb-4">
            <input {{ $settings->showBookingFilter ? 'checked' : '' }} id="showBookingFilters" name="showBookingFilter" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
            <label for="showBookingFilter" class="ms-2 text-sm font-medium text-gray-900">Show Booking Filters</label>
        </div>
        <div class=" items-center mb-4">
            <label>Select Button Color
                <input type="color" value="{{$settings->button_color}}" class="" name="button_color" />
            </label>
        </div>

        <x-submit-button value="Save"/>
    </form>
</x-app-layout>
