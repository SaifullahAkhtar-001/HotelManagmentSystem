<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <x-form.header title="Create Permission" subTitle="Here You Will Add The Permission Information !" />
        <form method="POST" action="{{route('admin.permissions.store')}}" enctype="multipart/form-data"
              class="max-w-7xl flex flex-col gap-6">
            @csrf
            <x-form.input name="name" type="name" label="Name" />
            <x-form.submit-button value="Create Permission"/>
        </form>

    </div>

</x-app-layout>
