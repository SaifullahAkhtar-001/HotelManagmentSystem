<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <x-form.header title="Update Permission" subTitle="Here You Will Update The Permission Information !" />
        <form method="POST" action="{{route('admin.permissions.update',$permission->id)}}"
              class="max-w-7xl flex flex-col gap-6">
            @csrf
            @method('PUT')
            <x-form.input name="name" type="name" label="Name" value="{{$permission->name}}"/>
            <x-form.submit-button value="Update Permission"/>
        </form>

    </div>

</x-app-layout>
