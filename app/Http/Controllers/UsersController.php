<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;

class UsersController extends Controller
{
    public function getList () 
    {
        $user = User::select('id','username','level')->orderBy('id','desc')->get()->toArray();
        return view('admin.user.list', compact('user'));
    }

    public function getAdd ()
    {
       return view('admin.user.add');
    }

    public function postAdd (UserRequest $request) {
       $user = new User();
       $user->username          =   $request->txtUser;
       $user->password          =   Hash::make( $request->txtPass);
       $user->email             =   $request->txtEmail;
       $user->level             =   $request->rdoLevel;
       $user->remember_token    =   $request->_token;
       $user->save();
       return redirect()->route('list_user')->with([
        'flash_level' => 'success',
        'flash_message'=>'Success !! Complete Add User'
        ]);
    }

    public function getEdit($id){
        $user = User::find($id);
        if ((Auth::user()->id != 2) && ($id == 2 || ($user["level"] == 1 && (Auth::user()->id != $id)))){
            return redirect()->route('list_user')->with([
                'flash_level' => 'danger',
                'flash_message'=>'You Can\'t Access Edit User'
            ]);
        }
        return view('admin.user.edit', compact('user','id'));
    }

    public function postEdit(Request $request,$id){
        $user = User::find($id);
        if ($request->input('txtPass')){
            $this->validate(
                $request,
                [
                    'txtRePass' => 'same:txtPass'
                ],
                [
                    'txtRePass.same' => 'Two Password Don\'t Match'
                ]
                );
                $pass = $request->input('txtRePass');
                $user->password = Hash::make($pass);
        }
        $user->email = $request->txtEmail;
        $user->level = $request->rdoLevel;
        $user->remember_token = $request->input('_token');
        $user->save();
        return redirect()->route('list_user')->with([
            'flash_level' => 'success',
            'flash_message'=>'Success Edit User'
        ]); 
    }

    public function getDelete($id){
         $user_current_login = Auth::user()->id;
         $user = User::find($id);
         if(($id == 2) || ($user_current_login != 2 && $user["level"] == 1)) {
            return redirect()->route('list_user')->with([
                'flash_level' => 'danger',
                'flash_message'=>'Sorry !! You Can\'t Access Delete User'
            ]);
         } else {
             $user->delete($id);
             return redirect()->route('list_user')->with([
                'flash_level' => 'success',
                'flash_message'=>'Success Delete User'
            ]);
         }
    }
}
