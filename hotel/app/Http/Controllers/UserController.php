<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
}
