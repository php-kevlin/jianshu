<?php

namespace App;

class AdminPermission extends BaseModel
{
    //
    protected $table = 'admin_permissions';

    //权限属于哪一个角色
    public function roles()
    {

        return $this->belongsToMany(\App\AdminRole::class, 'admin_permission_role', 'role_id', 'permission_id')->withPivot(['permission_id', 'role_id']);
    }
}
