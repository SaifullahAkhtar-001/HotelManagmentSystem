<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <x-form.header title="Update Role" subTitle="Here You Will Update The Role Information !" />
        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}" class="max-w-7xl flex flex-col gap-6">
            @csrf
            @method('PUT')
            <x-form.input name="name" type="name" label="Name" value="{{ $role->name }}" />
            <x-form.submit-button value="Update Role" />
        </form>



    </div>



</x-app-layout>
