<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <h1 class="text-4xl my-12 font-bold">
            Edit Facility
        </h1>


        <form method="POST" action="{{route('facility.update', $facility->id)}}" class="max-w-4xl">
            @csrf
            @method('PUT')
            <x-hotel-input name="name" :value="$facility->name" title="Name" type="text"/>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-5">Edit Hotel</button>
        </form>

    </div>
</x-app-layout>
