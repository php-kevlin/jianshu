<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //登录页面
    public function index()
    {
        return view('login/index');
    }
    //登录行为
    public function Login()
    { //验证
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required',
            'is_remember'=>'integer'
        ]);
        //逻辑
        $user = request(['email','password']);
        $is_remember = boolval(request('is_remember'));
        if(\Auth::attempt($user,$is_remember)){
            return redirect('/posts');
        }
        //渲染
        return \Redirect::back()->withErrors('邮箱或者密码不匹配');


    }
    //登出行为
    public function Logout()
    {
        \Auth::logout();
        return redirect('login');

    }
}
