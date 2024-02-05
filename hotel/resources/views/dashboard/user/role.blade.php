<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Role Edit Form</title>
</head>

<body>

    <p>{{ session('message') }}</p>

    <div class="container mt-5">
        <div class="form-group">
            <div>{{ $user->name }}</div>
            <div>{{ $user->email }}</div>
        </div>
        
        <div class="mt-4 p-2">

             @if ($user->roles)
                @foreach ($user->roles as $user_role)
                    <span>
                        <form method="post" action="{{ route('admin.users.roles.remove', ['user' => $user->id, 'role' => $user_role->id]) }}"
                            onsubmit="return confirm ('Are You Sure');">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ $user_role->name }}</button>
                        </form>
                    </span>
                @endforeach

            @endif
        </div>  

         
        <div class='mt-6 p-2'>
            <h2 class="text-2xl font-semibold">Roles</h2>
            

        </div>
        <div>
            <form method="POST" action="{{ route('admin.users.roles',  $user->id) }}">
                @csrf
        
                <label for="role">Roles:</label>
                <select class="form-control" id="role" name="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Assign Role</button>
            </form>
        </div>
        
        
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html> 
