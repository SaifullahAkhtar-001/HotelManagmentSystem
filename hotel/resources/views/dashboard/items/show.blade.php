<x-app-layout>
        <div class="container mx-auto mt-8">
            <div class="lg:flex gap-12">
                <div class="w-96 h-fit p-4 rounded-xl border border-gray-200 ">
                    <img src="{{ asset($item->imggallery->first()->url) }}" alt="{{ $item->name }}" class="h-96 w-full object-cover object-center mb-4 rounded-lg">
                </div>
                <div class="p-8 border rounded-xl flex flex-col gap-8  ">
                    <div class="flex flex-col gap-4">
                        <p class="text-white text-sm w-fit  {{ $item->status > $item->min_stock_level? 'bg-green-500/60' : '' }}  {{ $item->quantity < $item->min_stock_level ? 'bg-yellow-500/60' : '' }}  {{ $item->status == 0 ? 'bg-red-500/60' : '' }}  backdrop-blur-md px-2 py-auto rounded-xl items-center">{{$item->status}}</p>
                        <p class="text-sm w-fit border bg-gray-200  backdrop-blur-md px-2 py-auto rounded-xl items-center">{{$item->category}}</p>
                    </div>
                    <div class="w-96 flex flex-col gap-2">
                        <div class="flex gap-24 justify-between items-baseline">
                            <p><strong>Name: </strong> {{ $item->name }}</p>
                            <div class="relative border px-6 py-4 border-gray-200 rounded-xl">
                                <div class="absolute top-[-8px] left-2 text-xs text-gray-400">{{ $item->unit_of_measurement }}</div>
                                <p>{{ $item->quantity }}</p>
                            </div>
                        </div>
                        <div><strong>Cost per Unit: </strong> ${{ $item->cost_per_unit }}</div>
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
