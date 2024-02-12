<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use spatie\permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return back();


    }

    public function show(User $user)
    {
        // Get all roles
        $allRoles = Role::all();
        // $permissions=Permission::all();

        // Get roles of the user
        $userRoles = $user->roles;

        // Exclude user's roles from all roles
        $roles = $allRoles->diff($userRoles);

        return view('dashboard.user.role', compact('user', 'roles'));
    }
    public function AssignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->roles)) {
            return back()->with('success', 'Role exist');
        }
        foreach ($request->roles as $role) {
            $user->assignRole($role);
        }

        return redirect()->back()->with('success', 'Role Assigned');
    }


    public function removeRole(User $user, $role)
    {
        $role = Role::findOrFail($role);
        if ($user->HasRole($role)) {
            $user->removeRole($role);
            return redirect()->back()->with('success', 'Role deleted');

        }
        return redirect()->back()->with('success', 'Role not exist');
    }
    public function givePermission(Request $request ,User $user){
    
@dd($request->permission);
        if($user->hasPermissionTo($request->permission)){
            
            return back()->with('message','permission exist');
        }
        
        $user->givePermissionTo($request->permission);  
        
        return redirect()->back()->with('message','Permission Grarnted');
    }

        
    
     public function revokePermission(user $user ,permission $permission) {
    // $permission = Permission::findOrFail($permission);
    // $role = User::findOrFail($user);

    

    if ($user->hasPermissionTo($permission)) {
        $user->revokePermissionTo($permission);
        return redirect()->back()->with('message', 'Permission Revoked');
    }

    return redirect()->back()->with('message', 'Permission Not exists');
}
public function showPermissions(User $user)
{
    // Get all roles
    
    $allpermissions=Permission::all();

    // Get roles of the user
    
    $userPermissions= $user->permissions;

    // Exclude user's roles from all roles
    $permissions = $allpermissions->diff($userPermissions);

    return view('dashboard.user.permission', compact('user', 'permissions'));
}

}
