<?php


use App\Models\Item;
use App\Models\Post;
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

// Route::get('/mypostform','App\Http\Controllers\SiteController@renderMyPostForm');
Route::resource('posts','App\Http\Controllers\PostController');

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('export/posts', 'App\Http\Controllers\PostController@export');
Route::get('import/posts', 'App\Http\Controllers\PostController@import');

//回應介紹
Route::get('/testv1', function () {
    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
});

Route::get('/testv2', function () {
    return redirect('https://www.google.com');
});

Route::get('/dl',function(){
    return response()->download(storage_path('app/public/files/test.pdf'));
});

Route::get('/file',function(){
    return response()->file(storage_path('app/public/files/test.pdf'));
});

//示範將商品加入購物車
Route::get('/addcart',function(){
    $item = Item::find(3);
    \Cart::session(Auth::user()->id)->add([
        'id' => $item->id,
        'name' => $item->title,
        'price' => $item->price,
        'quantity' => 3,
        'attributes' => array(),
        'associatedModel' => $item
    ]);
});

//示範取得購物車內容
Route::get('/getcartcontent',function(){
    $carts = \Cart::session(Auth::user()->id)->getContent();
    return $carts;
    // $result = '';
    // foreach ($carts as $cart) {
    //     $result = $result . $cart->name . ',';
    // }
    // return $result;
});

//示範變更購物車中商品的數量，update是做增減
Route::get('/updatecart',function(){
    \Cart::session(Auth::user()->id)->update(1,[
        'quantity' => -2
    ]);
});

//示範刪除購物車中的商品
Route::get('/removecart',function(){
    \Cart::session(Auth::user()->id)->remove(1);
});


//示範購物車是否為空
Route::get('/iscartempty',function(){
    return \Cart::session(Auth::user()->id)->isEmpty();
});

//示範取得購物車商品總數
Route::get('/getcartquantity',function(){
    $qty = \Cart::session(Auth::user()->id)->getTotalQuantity();
    return $qty;
});

//示範取得購物車小計
Route::get('/getcartsubtotal',function(){
    $subtotal = \Cart::session(Auth::user()->id)->getSubtotal();
    return $subtotal;
});

//示範清空購物車
Route::get('/clearcart',function(){
   \Cart::session(Auth::user()->id)->clear();
});

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/checkout','SiteController@checkout');
    Route::post('/checkout/callback','SiteController@checkoutCallback');
});

Route::view('livewire','livewire');

Route::get('onepost/{post}',App\Http\Livewire\Posts\OnePost::class);