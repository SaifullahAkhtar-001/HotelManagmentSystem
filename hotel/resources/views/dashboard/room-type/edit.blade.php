<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Edit Room Type" subTitle="Here You Will Edit Your Available Room Type!"/>
        <form method="POST" action="{{route('roomtype.update', $roomtype->id)}}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.input class="mb-8" name="name" type="name" label="Name" :value="$roomtype->name"/>
            <x-form.input class="mb-8" name="description" type="text" label="Description"
                          :value="$roomtype->description"/>
            <div class="flex gap-3">
                <x-form.input class="mb-8 flex-1" name="price" type="number" label="Price" :value="$roomtype->price"/>
                <x-form.input class="mb-8 flex-1" name="capacity" type="number" label="Capacity" :value="$roomtype->capacity"/>
                <x-form.input class="mb-8 flex-1" name="size" type="number" label="Size" :value="$roomtype->size"/>
            </div>
            <x-form.input class="mb-8" name="cancellation_policy" type="text" label="Cancellation Policy"
                          :value="$roomtype->cancellation_policy"/>
            <div class="my-3 max-w-xs">
                <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload image</label>
                <input name="roomtype_images[]" type="file"
                       class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60"
                       multiple/>
            </div>
            @foreach($errors->get('roomtype_images.*') as $error)
                @foreach($error as $message)
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                        <span class="font-medium">{{ $message }}</span>
                    </p>
                @endforeach
            @endforeach
            <x-image-preview :images="$roomtype->imggallery"/>
            <x-form.submit-button value="Update Room Type"/>
        </form>
    </div>
</x-app-layout>
