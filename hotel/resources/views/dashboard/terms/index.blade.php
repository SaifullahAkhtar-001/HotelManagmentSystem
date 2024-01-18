<x-app-layout>
    <div class="flex mx-4 justify-between items-center pb-8 text-4xl">
        <h1>Terms & Conditions</h1>
    </div>
    <div class="overflow-hidden rounded-lg border border-gray-200 mb-24 shadow-md">
        <table class="w-full border-collapse text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Terms & Condition</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach($hotel->term as $term)
                <x-tablerow.term :term="$term"  />
            @endforeach
            </tbody>
        </table>
    </div>

    <x-website_settings.block-wrapper title="Add Terms&Condition">
        <form method="POST" action="{{route('hotels.terms.store', $hotel->id)}}" class="max-w-6xl flex flex-col gap-6" >
            @csrf
            <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
            <x-form.input name="term" type="term" label="Term" :value="old('term')"/>
            <x-form.submit-button value="Add Term"/>
        </form>
    </x-website_settings.block-wrapper>

</x-app-layout>
