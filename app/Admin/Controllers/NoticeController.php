<?php
namespace App\Admin\Controllers;
class NoticeController extends Controller
{
    public function index()
    {
        $notices = \App\Notice::all();
        return view('admin/notice/index',compact('notices'));
    }

    public function create()
    {
        return view('admin/notice/create');
    }

    public function store()
    {
        $this->validate(request(),[
            'title'=>'required|string',
            'content'=>'required|string',
        ]);
        $title = request('title');
        $description = request('content');
        $notice = \App\Notice::create(compact('title','description'));

        $this->dispatch(new \App\Jobs\SeedMessage($notice));

        return redirect('admin/notices');

    }
}