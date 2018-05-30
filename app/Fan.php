<?php

namespace App;

class Fan extends BaseModel
{
    //粉丝用户
    public function fan()
    {
        return $this->hasOne(\App\User::class,'id','fan_id');
    }
    //
    public function star()
    {
        return $this->hasOne(\App\User::class,'id','star_id');
    }

}
