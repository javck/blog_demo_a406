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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/blog/cateogry/{category}','App\Http\Controllers\SiteController@renderBlogPageByCategory');
Route::get('/blog','App\Http\Controllers\SiteController@renderBlogPage');
Route::get('/blog/{post}','App\Http\Controllers\SiteController@renderPostPage');

Route::view('/info','info');