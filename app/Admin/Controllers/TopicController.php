<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/5/24
 * Time: 17:22
 */
namespace App\Admin\Controllers;

class TopicController extends Controller
{
    public function index()
    {
        $topics = \App\Topic::all();
        return view('admin.topic.index',compact('topics'));
    }

    public function create()
    {
        return view('admin.topic.create');
    }

    public function store()
    {
        $this->validate(request(),[
           'name'=>'required|string'
        ]);
        $name = request('name');
        \App\Topic::create(compact('name'));
        return redirect('admin/topics');

    }

    public function destroy(\App\Topic $topic)
    {
        $topic->delete();
        return [
            'error'=>0,
            'message'=>''
        ];
    }
}