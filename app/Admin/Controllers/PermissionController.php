<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/5/26
 * Time: 10:59
 */

namespace App\Admin\Controllers;


use App\AdminPermission;

class PermissionController extends Controller
{
    //权限列表
    public function index()
    {
        $permissions = AdminPermission::all();
        return view('admin/permission/index',compact('permissions'));
    }

    //创建权限
    public function create()
    {
       return view('admin/permission/add');
    }
    //创建权限逻辑
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        \App\AdminPermission::create(request(['name', 'description']));
        return redirect('/admin/permissions');
    }

}