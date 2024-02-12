<x-app-layout>
    {{-- <div class="max-w-7xl mx-auto">
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
    --}}
    <div class="container mx-auto max-w-lg py-8">
        <h2 class="text-2xl font-semibold mb-4">Create Role</h2>
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-medium">Role Name:</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>
            <div class="mb-4">
                <label class="block font-medium">Permissions:</label>
                @foreach($permissions as $permission)
                    <div class="flex items-center">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label class="ml-2 block text-sm text-gray-900">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">Create Role</button>
        </form>
    </div>
    


    

</x-app-layout>
