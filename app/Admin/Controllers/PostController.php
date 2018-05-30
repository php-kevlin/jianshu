<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/5/24
 * Time: 11:45
 */
namespace App\Admin\Controllers;
use App\Post;
class PostController extends Controller
{
    //审核页面
    public function index()
    {
        $posts = Post::withOutGlobalScope('avaiable')->where('status',0)
            ->orderBy('created_at','desc')->paginate(10);
        return view('admin/post/index',compact('posts'));
    }
    //审核逻辑
    public function status(Post $post)
    {
        $this->validate(request(),[
           'status'=>'required|in:1,-1',
        ]);
        $post->status = request('status');
        $post->save();
        return [
          'error'=>0,
          'message'=>''
        ];

    }
}