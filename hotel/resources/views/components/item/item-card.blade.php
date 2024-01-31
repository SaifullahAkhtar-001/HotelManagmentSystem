<div
    class="lg:p-4 p-3 rounded-xl border border-gray-300 w-full flex lg:flex-col gap-3">
    <div class="max-lg:hidden flex justify-end w-full gap-2">
        <a x-data="{ tooltip: 'Edite' }" href="{{route('admin.item.edit', $item->id)}}"
           class="w-6 h-6 flex justify-center items-center rounded-md bg-gray-300">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-4 w-4 hover:stroke-blue-500 transition-all"
                x-tooltip="tooltip"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                />
            </svg>
        </a>
        <form method="POST" action="{{route('admin.item.destroy', $item->id)}}">
            @csrf
            @method('DELETE')

            <button type="submit" x-data="{ tooltip: 'Delete' }"
                    class="w-6 h-6 flex justify-center items-center rounded-md bg-gray-300">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-4 w-4 hover:stroke-red-500 transition-all"
                    x-tooltip="tooltip"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                    />
                </svg>
            </button>
        </form>
    </div>
    <a href="{{route('admin.item.show', $item->id)}}"><img src="{{asset($item->imggallery->first()->url)}}" alt="empty"
         class="h-24 w-24 lg:h-36 lg:w-36 mx-auto my-auto object-cover object-center rounded-full cursor-pointer hover:shadow-2xl"></a>
    <div class="flex flex-col gap-3 max-lg:flex-1">
        <div class="lg:hidden flex justify-end w-full gap-4">
            <a x-data="{ tooltip: 'Edite' }" href="{{route('admin.item.edit', $item->id)}}" class="w-6 h-6 flex justify-center items-center rounded-md bg-gray-300">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-4 w-4 hover:stroke-blue-500 transition-all"
                    x-tooltip="tooltip"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                    />
                </svg>
            </a>
            <form method="POST" action="{{route('admin.item.destroy', $item->id)}}" >
                @csrf
                @method('DELETE')

                <button type="submit" x-data="{ tooltip: 'Delete' }" class="w-6 h-6 flex justify-center items-center rounded-md bg-gray-300">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-4 w-4 hover:stroke-red-500 transition-all"
                        x-tooltip="tooltip"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                        />
                    </svg>
                </button>
            </form>
        </div>
        <div class="flex justify-between h-fit w-full">
            <h1 class="font-bold">{{$item->name}}</h1>
            <p class="text-white text-sm {{ $item->status > $item->min_stock_level? 'bg-green-500/60' : '' }}  {{ $item->quantity < $item->min_stock_level && $item->quantity > 0 ? 'bg-yellow-500/60' : '' }}  {{ $item->quantity == 0 ? 'bg-red-500/60' : '' }}  backdrop-blur-md px-2 py-auto rounded-xl items-center">{{$item->status}}</p>
        </div>
        <p class="text-blue-500 whitespace-nowrap">${{$item->cost_per_unit}} <span class="text-xs">/each</span></p>

        <div class="flex items-center justify-between gap-4">
            <p>Quantity:</p>
            <div>
                <button onclick="changeQuantity({{ $item->id }}, 'decrement')"
                        class="text-blue-500 bg-gray-300 hover:bg-gray-400 transition-all duration-200  px-2.5 py-0.5 rounded-lg">
                    -
                </button>
                <span id="quantityValue{{ $item->id }}" class="text-center px-2">{{$item->quantity}}</span>
                <button onclick="changeQuantity({{ $item->id }}, 'increment')"
                        class="text-blue-500 bg-gray-300 hover:bg-gray-400 transition-all duration-200 px-2 py-0.5 rounded-lg">
                    +
                </button>

            </div>
        </div>
        <a href="{{route('admin.item.show', $item->id)}}"
            class="max-sm:hidden bg-gray-300 hover:bg-gray-400 transition-all duration-200 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center me-2 cursor-pointer">
            see details
        </a>
    </div>
</div>
