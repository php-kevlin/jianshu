<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Zan;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //列表页面
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')
            ->withCount(['comments' ,'zans'])
            ->paginate(4);

        $posts->load('user');
        return view('post/index',compact('posts'));
    }
    //详请页面
    public function show(Post $post)
    {
        $post->load('comments');
        return view('post/show',compact('post'));
    }
    //创建文章页面
    public function create()
    {
        return view('post/create');
    }
    //创建文章逻辑
    public function store(Request $request)
    {
        //验证
        $this->validate($request,[
            'title'=>'required|string|max:40|min:4',
            'content'=>'required'
        ]);
        //逻辑
//        $params = ['title'=>request('title'),'content'=>request('content')];
//        $params = request(['title','content']);
        $user_id = \Auth::id();
        $params = array_merge(request(['title','content']),compact('user_id'));
        Post::create($params);

        //渲染
        return redirect('/posts');
//        dd(request()->all());
    }
    //编辑文章页面
    public function edit(Post $post)
    {
        return view('post/edit',compact('post'));
    }
    //编辑文章逻辑
    public function update(Post $post)
    {
        //验证
        $this->validate(request(),[
            'title'=>'required|string|max:40|min:4',
            'content'=>'required'
        ]);
        $this->authorize('update',$post);

        //逻辑
        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        //渲染
        return redirect("/posts/{$post->id}");
    }
    //删除文章
    public function delete(Post $post)
    {
        //todo:用户权限认证
        $this->authorize('update',$post);
        $post->delete();
        return redirect('/posts');
    }
    //上传图片
    public function imageUpload(Request $request)
    {
        //拿到图片文件存到storepublicly目录并且以以时间戳命名
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
       return asset('storage/'.$path);
    }

    //提交评论
    public function comment(Post $post)
    {
        //验证
        $this->validate(request(),[
           'content'=>'required'
        ]);
        //逻辑
        $comment = new Comment();
        $comment->user_id = \Auth::id();
        $comment->content =  request('content');

        $post->comments()->save($comment);
        //渲染
        return back();
    }

    //赞
    public function zan(Post $post)
    {
        $params = [
          'user_id'=> \Auth::id(),
          'post_id'=>$post->id
        ];
        Zan::firstOrCreate($params);
        return back();
    }
    //取消赞
    public function unzan(Post $post)
    {
        $post->zan(\Auth::id())->delete();
        return back();
    }




}
