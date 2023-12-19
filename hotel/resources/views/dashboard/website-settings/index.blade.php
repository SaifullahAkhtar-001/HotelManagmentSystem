<x-app-layout>
    <form method="post">
        @csrf
        <div class="flex items-center mb-4">
            <input id="default-checkbox" name="showBookingFilter" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 cursor-pointer">
            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900">Default checkbox</label>
        </div>
        <x-submit-button value="Save"/>
    </form>
</x-app-layout>
