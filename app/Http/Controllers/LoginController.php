<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;


class LoginController extends Controller
{
    public function getLogin () {
        return view('admin.login');
    }

    public function postLogin (LoginRequest $request) {

        $data = array(
            'email' => $request->username,
            'password' => $request->password
        );
        if(Auth::attempt($data)) {
            return redirect()->route('list_cate');
        } else {
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu chưa đúng');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('logins');
    }
}
