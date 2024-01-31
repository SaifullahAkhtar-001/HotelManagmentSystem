<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Edit Hotel" subTitle="Here You Will Edit The Hotel Information !"/>
        <form method="POST" action="{{route('admin.hotels.update', $hotel->id)}}" class="max-w-6xl flex flex-col gap-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex max-md:flex-col gap-3">
                <x-form.input class="lg:w-[450px]" :value="$hotel->hotel_name" name="hotel_name" type="name"
                              label="Hotel Name"/>
                <x-form.input class="lg:flex-1" :value="$hotel->email" name="email" type="email" label="Email"/>
                <x-form.input class="flex-1" :value="$hotel->phone" name="phone" type="text" label="Phone"/>
            </div>
            <x-form.input name="about" :value="$hotel->about" type="text" label="About"/>
            <x-form.input name="description" :value="$hotel->description" type="text" label="Description"/>
            <x-form.input name="address" :value="$hotel->address" type="text" label="Address"/>
            <div class="flex gap-3">
                <x-form.input class="flex-1" :value="$hotel->city" name="city" type="text" label="City"/>
                <x-form.input class="flex-1" :value="$hotel->zip_code" name="zip_code" type="number"
                              label="Zip Code"/>
            </div>
            <div>
            <label for="facilities" class="font-semibold text-gray-500 block pb-2">Facilities:</label>
            @foreach($facilities as $facility)
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="facilities[]" value="{{ $facility->id }}"
                           {{ in_array($facility->id, $hotel->facilities->pluck('id')->toArray()) ? 'checked' : '' }} class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-orange-300  rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-orange-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 me-2">{{ $facility->name }}</span>
                </label>
            @endforeach
            </div>
            <x-toggle :checker="$hotel->active ? 'checked' : '' "/>
            <div class="my-3 max-w-xs">
                <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload image</label>
                <input name="hotel_images[]" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" multiple />
            </div>
            @foreach($errors->get('hotel_images.*') as $error)
                @foreach($error as $message)
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        <span class="font-medium">{{ $message }}</span>
                    </p>
                @endforeach
            @endforeach
            <x-form.image-preview :images="$hotel->imggallery"/>


            <x-form.submit-button value="Edit Hotel"/>
        </form>
    </div>
</x-app-layout>
