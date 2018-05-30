<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/5/23
 * Time: 21:08
 */
 namespace App\Admin\Controllers;
 class HomeController extends Controller
 {
    public function index()
    {
        return view('admin.home.index');
    }
 }