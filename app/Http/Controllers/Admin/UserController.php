<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function usersList()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function changeStatus(Request $request,$id){
        $user = User::find($id);

        if($user->status == 1){
            $user->status = 0;
        }
        else{
            $user->status = 1;
        }

        $user->update();
        return back()->with('success','Status updated successfully');
    }
}
