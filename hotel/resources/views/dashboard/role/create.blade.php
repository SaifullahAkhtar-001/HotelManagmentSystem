<x-app-layout>
     <div class="max-w-7xl mx-auto">
        <x-form.header title="Create Role" subTitle="Here You Will Add The Role Information !" />
        <form method="POST" action="{{route('admin.roles.store')}}" enctype="multipart/form-data"
              class="max-w-7xl flex flex-col gap-6">
            @csrf
            <x-form.input name="name" type="name" label="Name" />
            <div class="form-group">
                <label>Permissions:</label><br>
                @foreach($permissions as $permission)
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"> {{ $permission->name }}<br>
                @endforeach
            </div>
            <x-form.submit-button value="Create Role"/>
        </form>
    </div>
</x-app-layout>
