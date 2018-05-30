<?php
/**
 * Created by PhpStorm.
 * User: 张凯凯
 * Date: 2018/5/23
 * Time: 19:38
 */
//管理后台
Route::group(['prefix'=>'admin'],function (){
    //登录展示页面
   Route::get('/login','\App\Admin\Controllers\LoginController@index');
    //登录行为
    Route::post('/login','\App\Admin\Controllers\LoginController@login');
    //登录展示页面
    Route::get('/logout','\App\Admin\Controllers\LoginController@logout');

    Route::group(['middleware'=>'auth:admin'],function(){
        //后台首页
        Route::get('/home','\App\Admin\Controllers\HomeController@index');

        Route::group(['middleware'=>'can:system'],function (){

            //管理人员模块
            //管理员列表
            Route::get('/users','\App\Admin\Controllers\UserController@index');
            //管理员创建页面
            Route::get('/users/create','\App\Admin\Controllers\UserController@create');
            //管理员创建逻辑
            Route::post('/users/store','\App\Admin\Controllers\UserController@store');
            //用户的角色页面
            Route::get('/users/{user}/role','\App\Admin\Controllers\UserController@role');
            //给用户分配角色
            Route::post('/users/{user}/role','\App\Admin\Controllers\UserController@storeRole');

            //角色
            //角色列表
            Route::get('/roles','\App\Admin\Controllers\RoleController@index');
            //角色创建页面
            Route::get('/roles/create','\App\Admin\Controllers\RoleController@create');
            //角色创建逻辑
            Route::post('/roles/store','\App\Admin\Controllers\RoleController@store');
            //角色拥有的权限页面
            Route::get('/roles/{role}/permission','\App\Admin\Controllers\RoleController@permission');
            //给角色分配权限
            Route::post('/roles/{role}/permission','\App\Admin\Controllers\RoleController@storePermission');

            //权限
            //权限列表
            Route::get('/permissions','\App\Admin\Controllers\permissionController@index');
            //权限创建页面
            Route::get('/permissions/create','\App\Admin\Controllers\permissionController@create');
            //权限创建逻辑
            Route::post('/permissions/store','\App\Admin\Controllers\permissionController@store');
        });


        Route::group(['middleware'=>'can:post'],function (){

        //审核模块
        //页面
        Route::get('posts','\App\Admin\Controllers\PostController@index');
        //逻辑
        Route::post('posts/{post}/status','\App\Admin\Controllers\PostController@status');
        });
        //专题管理
        //页面
        Route::resource('topics','\App\Admin\Controllers\TopicController',
            ['only'=>['index','create','store','destroy']]);


        //通知管理
        Route::resource('notices','\App\Admin\Controllers\NoticeController',
            ['only'=>['index','create','store']]);
    });



});
