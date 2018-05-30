<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/5/26
 * Time: 10:59
 */

namespace App\Admin\Controllers;


use App\AdminRole;

class RoleController extends Controller
{
    //角色列表
    public function index()
    {
        $roles = \App\AdminRole::paginate(10);
        return view('admin/role/index',compact('roles'));
    }

    //创建角色
    public function create()
    {
        return view('admin/role/add');
    }
    //创建角色逻辑
    public function store()
    {
        $this->validate(request(),[
           'name'=>'required',
           'description'=>'required'
        ]);

        \App\AdminRole::create(request(['name','description']));

        return redirect('admin/roles');

    }

    //角色权限关系页面
    public function permission(AdminRole $role)
    {
        //获取所有权限
            $permissions = \App\AdminPermission::all();
        //获取当前角色权限
        $myPermissions = $role->permissions;

        return view('admin/role/permission',compact('role','permissions','myPermissions'));
    }
    //储存角色权限行为
    public function storePermission(AdminRole $role)
    {
        $this->validate(request(),[
            'permissions' => 'required|array'
        ]);

        $permissions = \App\AdminPermission::findMany(request('permissions'));
        $myPermissions = $role->permissions;

        // 对已经有的权限
        $addPermissions = $permissions->diff($myPermissions);
        foreach ($addPermissions as $permission) {
            $role->grantPermission($permission);
        }

        $deletePermissions = $myPermissions->diff($permissions);
        foreach ($deletePermissions as $permission) {
            $role->deletePermission($permission);
        }
        return back();
    }


}