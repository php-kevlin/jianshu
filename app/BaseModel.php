<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/5/19
 * Time: 17:04
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class BaseModel extends Model
{

    protected $guarded = [];  //不可以注入的字段


}