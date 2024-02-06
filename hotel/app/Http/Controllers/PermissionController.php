<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use spatie\permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions=Permission::all();
        
        return view('dashboard.permission.index',compact('permissions'));
    }
    public function create(){
        return view('dashboard.permission.create');
    }
    public function store(Request $request){

        $validated=$request->validate(['name'=>['required','min:3']]);
        Permission::create($validated);
        return redirect()->route('admin.permissions.index')->with('success','Permission created successfully');
    }
        public function edit(int $id){
            $permission = Permission::find($id);
            return view('dashboard.permission.edit',compact('permission'));
    }
    public function update(Request $request, $id){
        $permission = Permission::find($id);
        $validated=$request->validate(['name'=>['required']]);
        $permission->update($validated);


        return redirect()->route('admin.permissions.index')->with('success','Permission Updated successfully');

    }
    public function destroy($id){
        $permission=Permission::find($id);
        $permission->delete();


        return redirect()->back()->with('success','Permission deleted successfully');

}
}
