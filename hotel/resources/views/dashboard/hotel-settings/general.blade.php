<x-hotelSettingsSection>
    <div class="">
        <h1 class="text-4xl my-8 font-bold">
            General Settings
        </h1>
    </div>
{{--        <form action="{{route('getValues')}}" method="post">--}}
{{--            @csrf--}}
            <label>
                <select onchange="this.form.submit()" name='hotel_id'
                        class="py-3 px-4 pe-9 mb-5 block w-34 shadow-lg border-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <option selected>Select the Hotel</option>
                    @foreach($hotels as $hotel )
                        <option value="{{$hotel->id}}">{{$hotel->hotel_name}}</option>
                    @endforeach
                </select>
            </label>
{{--        </form>--}}
{{--    </div>--}}

{{--    @if($generalSettings)--}}

{{--        <form method="post" action="">--}}
{{--            @csrf--}}
{{--            @method('put')--}}

{{--            <x-hotel-input name="hotel_name" :value="$generalSettings['hotelName']" title="Hotel Name" type="text"/>--}}
{{--            <x-hotel-textarea name="address" :value="$generalSettings['hotelAddress']" title="Address"/>--}}
{{--            <x-hotel-input name="email" :value="$generalSettings['contactInformation']['email']" title="Email" type="email"/>--}}
{{--            <x-hotel-input name="phone" :value=" $generalSettings['contactInformation']['phone'] " title="Phone" type="text"/>--}}
{{--            <x-toggle :checker="$hotel->active ? 'checked' : '' "/>--}}
{{--            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">Create Hotel</button>--}}



{{--        </form>--}}
{{--    @endif--}}

</x-hotelSettingsSection>
