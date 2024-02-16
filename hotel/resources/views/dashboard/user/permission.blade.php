<x-app-layout>

    <x-form.header :title="$user->name" :subTitle="$user->email"/>
    <div class="container mt-5">
        <h2 class="text-2xl font-semibold">Given Permissions</h2>
        <div class="mt-4 p-2 flex gap-4">
             @if ($user->permissions->isNotEmpty())
                @foreach ($user->permissions as $user_permission)
                    <span>
                        <form method="post" action="{{ route('admin.users.permissions.revoke', ['user' => $user->id, 'permission' => $user_permission->id]) }}"
                            onsubmit="return confirm ('Are You Sure');">

                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="flex space-x-4 items-center px-3 py-2 bg-indigo-500 hover:bg-indigo-800 rounded-full drop-shadow-md">
                                <span class="text-white text-md ">{{ $user_permission->name }}</span>
                                <svg class="svg-icon h-[20px] w-[20px] overflow-hidden fill-white"
                                     viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path
                                        d="M810.65984 170.65984q18.3296 0 30.49472 12.16512t12.16512 30.49472q0 18.00192-12.32896 30.33088l-268.67712 268.32896 268.67712 268.32896q12.32896 12.32896 12.32896 30.33088 0 18.3296-12.16512 30.49472t-30.49472 12.16512q-18.00192 0-30.33088-12.32896l-268.32896-268.67712-268.32896 268.67712q-12.32896 12.32896-30.33088 12.32896-18.3296 0-30.49472-12.16512t-12.16512-30.49472q0-18.00192 12.32896-30.33088l268.67712-268.32896-268.67712-268.32896q-12.32896-12.32896-12.32896-30.33088 0-18.3296 12.16512-30.49472t30.49472-12.16512q18.00192 0 30.33088 12.32896l268.32896 268.67712 268.32896-268.67712q12.32896-12.32896 30.33088-12.32896z"/></svg>
                            </button>
                        </form>
                    </span>
                @endforeach
                @else
                <p>No permission is Giver to this User</p>

            @endif
        </div>


        <div class='mt-6 p-2'>
            <h2 class="text-2xl font-semibold">Give Permissions</h2>

        </div>
        <div>
            <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                @csrf
                <div class="flex gap-4 my-4 p-4">
                    @foreach ($permissions as $permission)
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="{{ $permission->id }}" name="permissions[]" value="{{ $permission->name }}" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer  peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-500">{{ $permission->name }}</span>
                        </label>
                    @endforeach
                </div>
                <x-form.submit-button value="GivePermission" />
            </form>
            
        </div>
    </div>
</x-app-layout>
