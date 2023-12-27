<x-app-layout>
    <div class="max-w-7xl  mx-auto">
        <x-form.header title="Create Facility" subTitle="Here You Will Add Your Available Facility!" />
    @foreach( $errors->all() as $errors)
        <p>{{$errors}}</p>
        @endforeach
        <form method="POST" action="{{route('create.facility')}}" class="max-w-4xl">
            @csrf
            <x-form.input class="mb-8" name="name" type="name" label="Name" />
            <x-form.submit-button value="Create Facility" />
        </form>

    </div>
    </x-app-layout>
