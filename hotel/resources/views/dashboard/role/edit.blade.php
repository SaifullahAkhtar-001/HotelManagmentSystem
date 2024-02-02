<x-app-layout>
    <div class="container mt-5">
        
        <form method="Post" action="{{route('admin.roles.update',$role->id)}}">
            @csrf
            @method('put');
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="{{$role->name}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


</x-app-layout>
