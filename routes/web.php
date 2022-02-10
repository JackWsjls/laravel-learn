<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home/hello', 'HomeController@hello');
//Route::post('/home/hello', 'HomeController@hello');
//Route::delete('/home/hello', 'HomeController@hello');
//Route::put('/home/hello', 'HomeController@hello');
//Route::any('/home/hello', 'HomeController@hello'); // 支持任意
//Route::match(['get', 'post'], '/home/hello', 'HomeController@hello')->middleware(\App\Http\Middleware\Benchmark::class);
Route::match(['get', 'post'], '/home/hello', 'HomeController@hello');
Route::match(['get', 'post'], '/home/hello2', 'HomeController@hello2');
Route::match(['get', 'post'], '/home/dbTest1', 'HomeController@dbTest1');
//    ->middleware('benchmark');

// 支持重定向 301 永久重定向 302 临时重定向
// 搜索引擎SEO 302 收录的是定向之前的 301 是定向之后的
Route::get('here', function() {
    return '重定向前';
});
Route::get('there', function() {
    return '重定向后';
});
//301 - 永久重定向
//Route::permanentRedirect('here', 'there');
//302 - 临时重定向
Route::redirect('here', 'there');

//路由传参
//Route::get('getOrder', 'HomeController@getOrder');
//Route::any('getOrder', 'HomeController@getOrder');
//  控制器方式路由
//Route::get('getOrder/{id?}/{name}', 'HomeController@getOrder'); // ?支持不传参数
//  闭包方式路由
Route::get('getOrder/{id?}/{name}', function($id,$name) {
    return [1,$id,$name];
})->where('id', '[0-9]+')->where('name','[a-zA-Z]+');
// 匹配所有字符 .*

//命名路由
Route::get('getUser', 'HomeController@getUser')->name('get.user');
Route::get('getUrl', function() {
//    return redirect()->route('get.user', ['id'=>'11']);
//    return redirect()->to(\route('get.user', ['id'=>'10']));
//    return \route('get.user'); //获取全路径 http://wsjls.test/getUser
    return \route('get.user', [], false); //获取相对路径 http://wsjls.test/getUser
});

// 分组
