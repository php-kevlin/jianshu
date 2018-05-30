<?php

namespace App\Http\Controllers;

use App\Notice;
use App\User;
use Illuminate\Http\Request;

class NtController extends Controller
{
    //注册页面
    public function index()
    {
        $user =\Auth::user();
        $notices = $user->notices;

        return view('notice/index',compact('notices'));
    }

    //

}
