<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function index()
     {
          $users = user::all();
          return view('admin.user.index', compact('users'));
     }

     public function edit($user_id)
     {
          $users = user::find($user_id);
          return view('admin.user.edit', compact('users'));
     }

     public function update(Request $request, $user_id)
     {

          $user = User::find($user_id);
          if ($user) {

               $user->name = $request->name;
               $user->email = $request->email;
               $user->role_as = $request->role_as;
               $user->update();
               return redirect('admin/users')->with('message', 'update successs');
          }
          return redirect('admin/users')->with('message', 'no user found');
     }



     public function destroy($user_id)
     {
          $user = User::find($user_id);
          if ($user) {
               $user->delete();
               return redirect('admin/users' . $user->user_id)->with('message', 'User Deleted');
          } else {
               return redirect('admin/users' . $user->user_id)->with('message', 'User not Deleted');
          }
     }
}
