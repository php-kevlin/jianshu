<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//回调函数
Route::get('/', function () {
    return view('welcome');
});


//Route::get('路由名称','[控制器名称@行为（方法）]');
//Route::get('/posts/{id}','\APP\HTTP\Controller\IndexController@index');
/**
 * 用户模块
 */
//通知页面
Route::get('/notices','\App\Http\Controllers\NtController@index');
// 注册页面
Route::get('/register','\App\Http\Controllers\RegisterController@index');
//注册逻辑
Route::post('/register','\App\Http\Controllers\RegisterController@register');
//登录页面
Route::get('/login','\App\Http\Controllers\LoginController@index');
//登录逻辑
Route::post('/login','\App\Http\Controllers\LoginController@Login');
//登出逻辑
Route::get('/logout','\App\Http\Controllers\LoginController@Logout');
//个人设置页面
Route::get('/user/me/setting','\App\Http\Controllers\UserController@setting');
//个人设置操作
Route::post('/user/me/setting','\App\Http\Controllers\UserController@settingStore');
//个人中心
Route::get('/user/{user}','\App\Http\Controllers\UserController@show');
//关注
Route::post('/user/{user}/fan','\App\Http\Controllers\UserController@fan');
//取消关注
Route::post('/user/{user}/unfan','\App\Http\Controllers\UserController@unfan');



/*
 * 文章模块
 */
//文章列表页
Route::get('/posts','\App\Http\Controllers\PostController@index');

//创建文章
Route::get('/posts/create','\App\Http\Controllers\PostController@create');
Route::post('/posts','\App\Http\Controllers\PostController@store');

//文章详请页
Route::get('/posts/{post}','\App\Http\Controllers\PostController@show');

//编辑文章
Route::get('/posts/{post}/edit','\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}','\App\Http\Controllers\PostController@update');

//图片上传
Route::post('/posts/image/upload','\App\Http\Controllers\PostController@imageUpload');

//删除文章
Route::get('/posts/{post}/delete','\App\Http\Controllers\PostController@delete');

//提交评论
Route::post('/posts/{post}/comment','\App\Http\Controllers\PostController@comment');

//赞
Route::get('/posts/{post}/zan','\App\Http\Controllers\PostController@zan');

//取消赞
Route::get('/posts/{post}/unzan','\App\Http\Controllers\PostController@unzan');

//专题模块
//专题详请
Route::get('/topic/{topic}','\App\Http\Controllers\TopicController@show');
//投稿
Route::post('/topic/{topic}/submit','\App\Http\Controllers\TopicController@submit');



include_once ('admin.php');



