<x-app-layout>
    <div class="flex justify-end">
        <button
            type="button" onclick="window.history.back()"
            class="inline-block rounded bg-neutral-800 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-50 shadow-[0_4px_9px_-4px_rgba(51,45,45,0.7)] transition duration-150 ease-in-out hover:bg-neutral-800 hover:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:bg-neutral-800 focus:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-[0_8px_9px_-4px_rgba(51,45,45,0.2),0_4px_18px_0_rgba(51,45,45,0.1)] dark:bg-neutral-900 dark:shadow-[0_4px_9px_-4px_#030202] dark:hover:bg-neutral-900 dark:hover:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:focus:bg-neutral-900 dark:focus:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)] dark:active:bg-neutral-900 dark:active:shadow-[0_8px_9px_-4px_rgba(3,2,2,0.3),0_4px_18px_0_rgba(3,2,2,0.2)]">
            Back
        </button>
    </div>
        <div class="container mx-auto mt-8">
            <div class="lg:flex gap-12">
                <div class="w-96 h-fit p-4 rounded-xl border border-gray-200 ">
                    <img src="{{ asset($item->imggallery->first()->url) }}" alt="{{ $item->name }}" class="h-96 w-full object-cover object-center mb-4 rounded-lg">
                    <h1 class="font-bold">{{$item->name}}</h1>
                    <h1 class="">${{$item->cost_per_unit}}/<span class="text-xs">{{$item->unit_of_measurement}}</span></h1>
                </div>
                <div class="p-8 border rounded-xl flex flex-col gap-8  ">
                    <div class="flex flex-col gap-4">
                        <p class="text-white text-sm w-fit  {{ $item->status > $item->min_stock_level? 'bg-green-500/60' : '' }}  {{ $item->quantity < $item->min_stock_level ? 'bg-yellow-500/60' : '' }}  {{ $item->status == 0 ? 'bg-red-500/60' : '' }}  backdrop-blur-md px-2 py-auto rounded-xl items-center">{{$item->status}}</p>
                        <p class="text-sm w-fit border bg-gray-200  backdrop-blur-md px-2 py-auto rounded-xl items-center">{{$item->category}}</p>
                    </div>
                    <div class="w-96 flex flex-col gap-2">
                        <div class="flex gap-24 justify-between items-baseline">
                            <div class="relative border px-6 py-4 border-gray-200 rounded-xl">
                                <div class="absolute top-[-8px] left-2 text-xs text-gray-400">Quantity</div>
                                <p>{{ $item->quantity }}</p>
                            </div>
                        </div>
                        <div><strong>Minimum Stock Level: </strong> {{ $item->min_stock_level }}</div>
                        <div><strong>Location/Storage Area: </strong> {{ $item->location }}</div>
                        <div><strong>Date of Purchase: </strong> {{ $item->date_of_purchase }}</div>
                        <div><strong>Expiry Date: </strong> {{ $item->expiry_date ?? 'N/A' }}</div>
                        <div><strong>Note: </strong>{{ $item->notes }}</div>
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
