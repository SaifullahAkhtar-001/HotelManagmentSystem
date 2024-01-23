<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <x-form.header title="Create Hotel" subTitle="Here You Will Add The Hotel Information !" />
        <form method="POST" action="{{route('hotels.store')}}" enctype="multipart/form-data"
              class="max-w-7xl flex flex-col gap-6">
            @csrf
            <div class="flex max-md:flex-col gap-3">
                <x-form.input class="lg:w-[450px]" name="hotel_name" type="name" label="Hotel Name" />
                <x-form.input class="lg:flex-1" name="email" type="email" label="Email"/>
                <x-form.input class="flex-1" name="phone" type="text" label="Phone"/>
            </div>
            <x-form.input name="about" type="text" label="About"/>
            <x-form.input name="description" type="text" label="Description"/>
            <x-form.input name="address" type="text" label="Address"/>
            <div class="flex gap-3">
                <x-form.input class="flex-1" name="city" type="text" label="City"/>
                <x-form.input class="flex-1" name="zip_code" type="number"
                              label="Zip Code"/>
            </div>
            <label for="facilities" class="block text-sm font-semibold text-gray-500">Facilities:
            <div class="flex gap-3 items-center ">
                <div class="flex gap-3 pt-2">
                    @foreach($facilities as $facility)
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="facilities[]" value="{{ $facility->id }}" class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300  rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-orange-600"></div>
                            <span class="ms-3 me-2 text-sm font-medium text-gray-500">{{ $facility->name }}</span>
                        </label>
                    @endforeach
                </div>
                <x-add_button link="{{ route('facility.create') . '?hotel=true' }}" tooltip="Add Facility"/>


            </div>
            </label>
            <x-toggle checker=""/>
            <div class="my-3 max-w-xs">
                <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload image</label>
                <input name="hotel_images[]" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" multiple />
            </div>
            @error('hotel_images')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</p>
            @enderror
            <x-form.submit-button value="Create Hotel"/>
        </form>

    </div>


</x-app-layout>
