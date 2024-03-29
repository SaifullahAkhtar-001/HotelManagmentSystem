@if($images->count() > 0)
    <div class="w-fit h-fit grid grid-cols-2 md:grid-cols-8 pb-4 gap-5">
        @foreach($images as $image)
            <div class="flex gap-3 w-32 h-32 relative">
                <img src="{{ asset($image->url) }}" alt="" class="w-full object-cover rounded-xl">
                    <a href="{{route('admin.image.delete', $image->id)}}" onclick="return confirm('Are you sure you want to delete image from image gallery?')" type="button"
                        class="absolute text-xs right-1 top-1 p-1 bg-gray-500 rounded-2xl bg-opacity-70">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6 stroke-red-500 hover:stroke-red-600 transition-all"
                            x-tooltip="tooltip"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                            />
                        </svg>
                    </a>
            </div>
        @endforeach
    </div>
@else
    <p class="text-xs text-red-500">No Image Found!</p>
@endif
