<x-app-layout>
    <button type="button"  onclick="window.history.back()"
            class="max-md:hidden fixed top-8 left-64 flex items-center justify-center w-24 z-50 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border border-gray-200 rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
        </svg>
        <span>Go back</span>
    </button>
    <div class="flex mx-4 justify-between items-center py-8 text-4xl">
        <h1>Add Images</h1>
        <a href="{{route('hotels.interior.create', $hotel->id)}}"
           class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer">Add Interior</a>
    </div>
    <div class="md:flex-col flex gap-3">
        @foreach($interiors as $interior)
            <x-form.image-preview :images="$interior->imggallery"/>
        @endforeach
    </div>
</x-app-layout>
