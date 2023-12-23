<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <h1 class="text-4xl my-8 font-bold">
            Create Facility
        </h1>
        @foreach( $errors->all() as $errors)
        <p>{{$errors}}</p>
        @endforeach
        <form method="POST" action="{{route('create.facility')}}" class="max-w-4xl">
            @csrf
            <x-hotel-input name="name" value="" title="Facility Name" type="text"/>
            <x-submit-button value="Create Facility" />
        </form>
    
    </div>
    </x-app-layout>
    