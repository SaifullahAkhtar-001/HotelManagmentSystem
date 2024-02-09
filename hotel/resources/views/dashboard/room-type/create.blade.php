<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Create Room Type" subTitle="Here You Will Add Your Available Room Type!" />
        <form method="POST" action="{{route('admin.roomtype.store')}}" class="max-w-4xl" enctype="multipart/form-data">
            @csrf
            <x-form.input class="mb-8" name="name" type="name" label="Name" />
            <x-form.input class="mb-8" name="description" type="description" label="Description" />
            <x-form.input class="mb-8" name="price" type="number" label="Price" />
            <x-form.input class="mb-8" name="cancellation_policy" type="text" label="Cancellation Policy" />
            <div class="my-3 max-w-xs">
                <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload image</label>
                <input name="roomtype_images[]" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" multiple />
            </div>
            @error('roomtype_images')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</p>
            @enderror
            <x-form.submit-button value="Create Room Type" />
        </form>
    </div>
</x-app-layout>
