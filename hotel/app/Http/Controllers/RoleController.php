<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use spatie\permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    public function index(){
        $roles=Role::all();
        return view('dashboard.role.index',compact('roles'));
    }
    public function create(){
       $permissions=Permission::all();
        return view('dashboard.role.create',compact('permissions'));
    }
    public function store(Request $request){

        $validated=$request->validate(['name'=>['required','min:3']]);
        Role::create($validated);
        return redirect()->route('admin.roles.index')->with('success','Role created successfully');
    }
        public function edit(int $id){
            $permissions=Permission::all();
            $role = Role::find($id);
            return view('dashboard.role.edit',compact('role','permissions'));
    }
    public function update(Request $request, $id){
        $role = Role::find($id);
        $validated=$request->validate(['name'=>['required']]);
        $role->update($validated);


        return redirect()->route('admin.roles.index')->with('success','Role Updated successfully');

    }
    public function destroy($id){
        $role=Role::find($id);
        $role->delete();


        return redirect()->back()->with('success','Role deleted successfully');

}
public function givepermission(Request $request, Role $role, $id){
    $role = Role::find($id);

    if($role->hasPermissionTo($request->permission)){
        return back()->with('message','permission exist');
    }
    
    $role->givePermissionTo($request->permission);  
    
    return redirect()->back()->with('message','Permission Grarnted');
}

public function revokePermission($role ,$permission) {
$permission = Permission::findOrFail($permission);
$role = Role::findOrFail($role);

if ($role->hasPermissionTo($permission)) {
    $role->revokePermissionTo($permission);
    return redirect()->back()->with('message', 'Permission Revoked');
}

return redirect()->back()->with('message', 'Permission Not exists');
}

}
