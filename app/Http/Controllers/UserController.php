<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户设置界面
    public function setting()
    {
        return view('user/setting');
    }
    //个人设置行为
    public function settingStore()
    {

    }

    //个人中心页面
    public function show(User $user)
    {
        //用户的信息 ，包含关注、粉丝，文章数
        $user = User::withCount(['fans','stars','posts'])->find($user->id);

        //用户的文章列表，取创建时间最新的前10条
        $posts = $user->posts()->orderBy('created_at','desc')->take(10)->get();

        //本用户关注的用户，包含关注用户的关注，粉丝，文章数
        $stars = $user->stars();
        $susers = User::whereIn('id',$stars->pluck('fan_id'))->withCount(['fans','stars','posts']);

        //这个人的粉丝用户,包含粉丝用户的关注，粉丝，文章数
        $fans = $user->fans();
        $fusers = User::whereIn('id',$fans->pluck('fan_id'))->withCount(['fans','stars','posts']);//将fan_id存入数组

        return view('user/show',compact('user','posts','susers','fusers'));
    }
    //关注
    public function fun(User $user)
    {
        $me = \Auth::user();
        \App\Fan::firstOrCreate(['fan_id' => $me->id, 'star_id' => $user->id]);
        return [
            'error' => 0,
            'msg' => ''
        ];
    }
    //取消关注
    public function unfun(User $user)
    {
        $me = \Auth::user();
        \App\Fan::where('fan_id', $me->id)->where('star_id', $user->id)->delete();
        return [
            'error' => 0,
            'msg' => ''
        ];
//        $me = \Auth::user();
//        $me->doFun($user->id);
//
//        return [
//            'error'=>0,
//            'msg'=>''
//        ];
    }
}
