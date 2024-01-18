<x-public-layout :website_settings="$website_settings" class="pt-56">
    <button type="button"  onclick="window.history.back()"
            class="max-md:hidden fixed top-8 left-4 flex items-center justify-center w-24 z-50 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border border-gray-200 rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
        </svg>
        <span>Go back</span>
    </button>
    <div class=" max-w-7xl mx-auto bg-gray-100 p-6 my-auto h-full rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Terms and Conditions</h2>

        <p class="mb-2">Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use.</p>

        <p class="mb-2">The use of this website is subject to the following terms:</p>

        <ul class="list-disc pl-8 mb-4">
            @foreach($terms as $term)
                <li>{{$term->term}}</li>
            @endforeach
        </ul>

        <p>By using this website, you acknowledge that such use is at your own risk and that we are not responsible for any direct or indirect damages.</p>
    </div>
</x-public-layout>
