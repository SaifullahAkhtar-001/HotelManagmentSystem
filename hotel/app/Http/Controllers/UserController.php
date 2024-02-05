<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use spatie\permission\Models\Role;
class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('dashboard.user.index',compact('users'));
    }
    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        return back();
        
        
    }
    public function show(User $user){
        
        $roles=Role::all();
        // $permissions=Permission::all();
        return view('dashboard.user.role',Compact('user','roles',));
}
public function AssignRole(Request $request, User $user){
     
        

    if($user->hasRole($request->role)){
        return back()->with('message','Role exist');
    }
    
    $user->AssignRole($request->role);  
    
    return redirect()->back()->with('message','Role Assigned');
}


public function removeRole(User $user , $role)
{
    $role = Role::findOrFail($role);
    if($user->HasRole($role)){
    $user->removeRole($role);
        return redirect()->back()->with('message', 'Role deleted');
    
    }
    return redirect()->back()->with('message', 'Role not exist');
}
}