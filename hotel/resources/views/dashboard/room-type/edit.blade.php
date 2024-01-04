<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Edit Room Type" subTitle="Here You Will Edit Your Available Room Type!"/>
        <form method="POST" action="{{route('roomtype.update', $roomtype->id)}}" class="max-w-4xl"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.input class="mb-8" name="name" type="name" label="Name" :value="$roomtype->name"/>
            <x-form.input class="mb-8" name="description" type="description" label="Description"
                          :value="$roomtype->description"/>
            <x-form.input class="mb-8" name="price" type="number" label="Price" :value="$roomtype->price"/>
            <x-form.input class="mb-8" name="capacity" type="number" label="Capacity" :value="$roomtype->capacity"/>
            <x-form.input class="mb-8" name="size" type="number" label="Size" :value="$roomtype->size"/>
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
            @if($roomtype_images->count() > 0)
                <div class="h-40 w-full flex gap-3">
                    @foreach($roomtype_images as $image)
                        <div class="flex gap-3 w-32 h-32 relative">
                            <img src="{{ asset($image->url) }}" alt="" class="object-cover">
                            <button
                                class="absolute text-red-500 text-xs right-1 top-1 p-1 bg-gray-500 rounded-2xl bg-opacity-70">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-6 w-6"
                                    x-tooltip="tooltip"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                    />
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-xs text-red-500">No Image Linked to this Hotel !</p>
            @endif
            <x-form.submit-button value="Update Room Type"/>
        </form>
    </div>
</x-app-layout>
