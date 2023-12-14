<x-app-layout>
<div class="max-w-7xl  mx-auto">
    <h1 class="text-4xl my-8 font-bold">
        Create Facility
    </h1>
    @foreach( $errors->all() as $errors)
    <p>{{$errors}}</p>
    @endforeach
    <form method="POST" action="{{route('facility.store')}}" class="max-w-4xl">
        @csrf
        <x-hotel-input name="name" value="" title="Facility Name" type="text"/>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-5">Create Hotel</button>
    </form>

</div>
</x-app-layout>
