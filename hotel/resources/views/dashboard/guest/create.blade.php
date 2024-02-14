<x-app-layout>
    <div class="max-w-7xl mx-auto">
    <x-form.header title="Create Guest" subTitle="Here we will gather the information of the guest!" />
        <form method="POST" action="{{route('admin.guest.store')}}" class="flex flex-col gap-4">
        @csrf
            <div class="flex gap-3">
                <x-form.input name="name" type="text" label="Name" class="flex-1"/>
                <x-form.input name="phone" type="text" label="Phone" class="flex-1"/>
            </div>
            <div class="flex gap-3">
                <x-form.input name="email" type="email" label="Email" class="flex-1"/>
                <x-form.input name="address" type="text" label="Address" class="flex-1"/>
            </div>
            <x-form.submit-button value="Create Guest"/>
        </form>
    </div>
</x-app-layout>
