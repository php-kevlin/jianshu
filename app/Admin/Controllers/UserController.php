<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/5/23
 * Time: 19:36
 */
namespace App\Admin\Controllers;
use App\AdminUser;

class UserController extends Controller
{
    //管理人员列表
    public function index()
    {
        $users = AdminUser::paginate(1);
        return view('admin/user/index',compact('users'));
    }
    //管理人员创建页面
    public function create()
    {
        return view('admin.user.add');
    }
    //管理人员创建逻辑
    public function store()
    {
       //验证
        $this->validate(request(),[
           'name'=>'required',
            'password'=>'required'
        ]);
        //接收并且保存
        $name = request('name');
        $password = bcrypt(request('password'));
        AdminUser::create(compact('name','password'));

        //渲染
        return redirect("admin/users");

    }

    //用户角色页面
    public function role(AdminUser $user)
    {
        $roles = \App\AdminRole::all();
        $myRoles = $user->roles;
        return view('admin/user/role',compact('myRoles','roles','user'));
    }
    //用户分配权限
    public function storeRole(AdminUser $user)
    {
        $this->validate(request(),[
            'roles'=>'required|array'
        ]);

        $roles = \App\AdminRole::findMany(request('roles'));
        $myRoles = $user->roles;
        //要增加的
        $addRoles = $roles->diff($myRoles); //差集
        foreach ($addRoles as $role)
        {
            $user->assignRole($role);
        }
        //要删除的
        $deleteRoles = $myRoles->diff($roles);
        foreach ($deleteRoles as $role)
        {
            $user->deleteRole($role);
        }

        return back();
    }

}