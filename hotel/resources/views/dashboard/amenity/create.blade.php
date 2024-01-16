<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <x-form.header title="Create Amenity" subTitle="Here You Will Add The Amenity Information !" />
        <form method="POST" action="{{route('amenity.store')}}" enctype="multipart/form-data"
              class="max-w-7xl flex flex-col gap-6">
            @csrf
            <label for="hotel_id" class="block mb-2 text-sm font-medium text-gray-500 ">Select the Hotel
                <select id="hotel_id" name="hotel_id"
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-56 p-2.5">
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                    @endforeach
                </select>
            </label>
            <x-form.input name="name" type="name" label="Name"/>
            <x-form.input name="description" type="description" label="Description"/>
            <div class="my-3 max-w-xs">
                <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload image</label>
                <input name="amenity_img" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" />
            </div>
            @error('amenity_img')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</p>
            @enderror
            <x-form.submit-button value="Create Amenity"/>
        </form>

    </div>


</x-app-layout>
