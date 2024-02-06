<x-app-layout>
    <div class="max-w-7xl mx-auto">
        <x-form.header title="Update Role" subTitle="Here You Will Update The Role Information !" />
        <form method="POST" action="{{route('admin.roles.update',$role->id)}}"
              class="max-w-7xl flex flex-col gap-6">
            @csrf
            @method('PUT')
            <x-form.input name="name" type="name" label="Name" value="{{$role->name}}"/>
            <x-form.submit-button value="Update Role"/>
        </form>

    </div>
    <div class="mt-4 p-2">

        @if ($role->permissions)
        
        @foreach ($role->permissions as $role_permission)
        
        <span> 
            <form method="post" action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">{{$role_permission->name}}</button>
            </form>                
    </span>
       
            
        @endforeach
            
        @endif
    </div> 
    <div>
        <form method="POST" action="{{route('admin.roles.permission', $role->id)}}">
            @csrf
            
            <label for="permissionSelect">Select Permission:</label>
            <select class="form-control" id="permissionSelect" name="permission">
              @foreach ($permissions as $permission)
              <option value="{{$permission->name}}">{{$permission->name}}</option>
                  
              @endforeach 
            </select>
            <button type="submit" class="btn btn-primary">Assign</button>
        </form>
    </div>
</div>



</x-app-layout>
