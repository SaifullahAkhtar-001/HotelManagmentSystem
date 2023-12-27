<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <h1 class="text-4xl my-12 font-bold">
            Edit Facility
        </h1>


        <form method="POST" action="{{route('facility.update', $facility->id)}}" class="max-w-4xl">
            @csrf
            @method('PUT')
            <x-hotel-input name="name" :value="$facility->name" title="Name" type="text"/>
            <x-form.submit-button value="Edit Facility" />
        </form>

    </div>
</x-app-layout>
