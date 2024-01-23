<x-public-layout :website_settings="$website_settings" class="pt-56">
    <button type="button"  onclick="window.history.back()"
            class="max-md:hidden fixed top-8 left-4 flex items-center justify-center w-24 z-50 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border border-gray-200 rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
        </svg>
        <span>Go back</span>
    </button>
    <section class="container mx-auto my-8 p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-4">About Us</h1>

        <!-- Our Story -->
        <div class="mb-8">
            <p class="text-gray-700">{{$hotel->about}}</p>
        </div>
    </section>
</x-public-layout>
