<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Edit Amenity" subTitle="Here You Will Edit The Amenity Information !"/>
        <form method="POST" action="{{route('admin.item.update', $item->id)}}" class="max-w-6xl flex flex-col gap-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex gap-3">
                <x-form.input name="name" type="text" label="Name" value="{{$item->name}}" class="w-[30rem]"/>
                <label class="flex-1">
                    <select name="category"
                            class="block cursor-pointer py-[11px] px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-200 @error('category') peer-focus:scale-75 peer-focus:text-red-600 @enderror peer-focus:text-blue-600 peer-focus:scale-75 peer">
                        <option value="room amenities" {{ $item->category == 'room amenities' ? 'selected' : '' }}>Room Amenities</option>
                        <option value="cleaning supplies" {{ $item->category == 'cleaning supplies' ? 'selected' : '' }}>Cleaning Supplies</option>
                        <option value="food and beverage" {{ $item->category == 'food and beverage' ? 'selected' : '' }}>Food and Beverage</option>
                        <option value="maintenance tools" {{ $item->category == 'maintenance tools' ? 'selected' : '' }}>Maintenance Tools</option>
                        <option value="uniforms and linens" {{ $item->category == 'uniforms and linens' ? 'selected' : '' }}>Uniforms and Linens</option>
                        <option value="event and conference supplies" {{ $item->category == 'event and conference supplies' ? 'selected' : '' }}>Event and Conference Supplies</option>
                        <option value="office supplies" {{ $item->category == 'office supplies' ? 'selected' : '' }}>Office Supplies</option>
                        <option value="guest services" {{ $item->category == 'guest services' ? 'selected' : '' }}>Guest Services</option>
                        <option value="security equipment" {{ $item->category == 'security equipment' ? 'selected' : '' }}>Security Equipment</option>
                        <option value="outdoor and recreational equipment" {{ $item->category == 'outdoor and recreational equipment' ? 'selected' : '' }}>Outdoor and Recreational Equipment</option>
                        <option value="technology and it equipment" {{ $item->category == 'technology and it equipment' ? 'selected' : '' }}>Technology and IT Equipment</option>
                    </select>
                    @error('category')
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</p>
                    @enderror
                </label>
                <label class="w-36">
                    <select name="unit_of_measurement"
                            class="block cursor-pointer py-[11px] px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-200 @error('category') peer-focus:scale-75 peer-focus:text-red-600 @enderror peer-focus:text-blue-600 peer-focus:scale-75 peer">
                        <option value="kg" {{ $item->unit_of_measurement == 'kg' ? 'selected' : '' }}>kgs</option>
                        <option value="ml" {{ $item->unit_of_measurement == 'ml' ? 'selected' : '' }}>ml</option>
                        <option value="pieces" {{ $item->unit_of_measurement == 'pieces' ? 'selected' : '' }}>pieces</option>
                    </select>
                    @error('unit_of_measurement')
                    <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</p>
                    @enderror
                </label>
            </div>
            <div class="flex gap-3">
                <x-form.input name="quantity" type="number" label="Quantity" class="flex-1" value="{{$item->quantity}}"/>
                <x-form.input name="cost_per_unit" type="number" label="Cost Per Unit" class="flex-1" value="{{$item->cost_per_unit}}" />
                <x-form.input name="min_stock_level" type="number" label="Min Stock Level" class="flex-1" value="{{$item->min_stock_level}}" />
            </div>
            <div class="flex gap-3">
                <x-form.input name="date_of_purchase" type="date" label="Date Of Purchase" value="{{$item->date_of_purchase}}" class="flex-1"/>
                <x-form.input name="expiry_date" type="date" label="Expiry Date" class="flex-1" value="{{$item->expiry_date}}" />
            </div>
            <x-form.input name="location" type="text" label="Location" value="{{$item->location}}"/>
            <x-form.input name="notes" type="text" label="Notes" value="{{$item->notes}}"/>

            <x-form.input name="hotel_id" type="number" label="Hotel Id" value="{{auth()->user()->hotels->first()->id}}"
                          class="hidden"/>
            <div class="my-3 max-w-xs">
                <label for="example1" class="mb-1 block text-sm font-medium text-gray-700">Upload image</label>
                <input name="item_img" id="example1" type="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" />
            </div>
            @error('item_img')
            <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</p>
            @enderror
            <x-form.image-preview :images="$item->imggallery"/>
            <x-form.submit-button value="Save"/>
        </form>
    </div>
</x-app-layout>
