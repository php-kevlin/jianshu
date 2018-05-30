<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/5/23
 * Time: 20:21
 */
namespace App\Admin\Controllers;

class LoginController extends Controller
{
    //登录展示页面
    public function index()
    {
        return view('admin.login.index');
    }

    //登录行为
    public function login()
    {
        //验证
        $this->validate(request(),[
            'name'=>'required',
            'password'=>'required',
                  ]);
        //逻辑
        $user = request(['name','password']);
               if(\Auth::guard("admin")->attempt($user)){
            return redirect('/admin/home');
        }
        //渲染
        return \Redirect::back()->withErrors('用户名或者密码不匹配');

    }
    //登出行为
    public function logout()
    {
        \Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }



}