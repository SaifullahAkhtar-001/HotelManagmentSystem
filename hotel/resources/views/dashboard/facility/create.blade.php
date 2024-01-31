<x-app-layout>
<div class="max-w-7xl  mx-auto">
    <x-form.header title="Create Facility" subTitle="Here You Will Add Your Available Facility!" />
    <form method="POST" action="{{route('admin.facility.store')}}" class="max-w-4xl">
        @csrf
        <input type="hidden" name="isHotel" value="{{$isHotel}}">
        <x-form.input class="mb-8" name="name" type="name" label="Name" />
        <x-form.submit-button value="Create Facility" />
    </form>

</div>
</x-app-layout>
