<?php


use Illuminate\Http\Request;
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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/blog/cateogry/{category}','App\Http\Controllers\SiteController@renderBlogPageByCategory');
Route::get('/blog','App\Http\Controllers\SiteController@renderBlogPage');
Route::get('/blog/{post}','App\Http\Controllers\SiteController@renderPostPage');

Route::view('/info','info');

Route::get('/storesession',function(){
    session(['ary' => array()]);
});

Route::get('/pushsession',function(Request $request){
    $request->session()->push('ary', 'aaa');
});
Route::get('/getsession',function(){
    return session('name');
});
Route::get('/pullsession',function(Request $request){
    return $request->session()->pull('price');
});

Route::get('/forgetsession',function(Request $request){
    return $request->session()->forget('name');
});

Route::get('/flushsession',function(Request $request){
    return $request->session()->flush();
});

Route::get('/getallsession',function(Request $request){
    return $request->session()->all();
});

Route::get('/mypostform','App\Http\Controllers\SiteController@renderMyPostForm');
Route::resource('posts','App\Http\Controllers\PostController');

Route::get('/feedback', function () {
    return view('feedback');
});

