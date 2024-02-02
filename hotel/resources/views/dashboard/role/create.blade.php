<x-app-layout>
    <div class="container mt-5">
        
        <form method="Post" action="{{route('admin.roles.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>


</x-app-layout>
