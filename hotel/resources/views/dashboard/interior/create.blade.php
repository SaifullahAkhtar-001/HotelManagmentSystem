<x-app-layout>
    <button type="button"  onclick="window.history.back()"
            class="max-md:hidden fixed top-8 left-64 flex items-center justify-center w-24 z-50 px-5 py-2 text-sm text-gray-700 transition-colors duration-200 bg-white border border-gray-200 rounded-lg gap-x-2 sm:w-auto hover:bg-gray-100">
        <svg class="w-5 h-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
        </svg>
        <span>Go back</span>
    </button>
    <div class="max-w-7xl mx-auto">
        <x-form.header title="Add Interior Images" subTitle="Here You Will Add The Interior Images !" />
        <form method="POST" action="{{route('hotels.interior.save')}}" enctype="multipart/form-data"
              class="max-w-7xl flex flex-col gap-6">
            @csrf
            <input type="hidden" name="hotel_id" value="{{$hotels->id}}">
            <div class="my-3 max-w-xs">
                <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload image</label>
                <input name="interior_images[]" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" multiple />
            </div>
            @error('interior_images')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</p>
            @enderror
            <x-form.submit-button value="Create Hotel"/>
        </form>

    </div>


</x-app-layout>
