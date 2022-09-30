<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Order;
use App\Models\Category;
use App\Models\ItemOrder;
use Illuminate\Http\Request;
use TsaiYiHua\ECPay\Checkout;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    protected $checkout;

    public function __construct(Checkout $checkout)
    {
        $this->checkout = $checkout;
        $this->checkout->setReturnUrl(url('checkout/callback'));
    }

    public function renderBlogPage()
    {
        $posts = Post::where('status','published')->orderBy('created_at','desc')->paginate(setting('admin.posts_per_page'));
        return view('blog',compact('posts'));
    }

    public function renderPostPage($id)
    {
        $post = Post::findOrFail($id);
        return view('post',compact('post'));
    }

    public function renderBlogPageByCategory(Category $category)
    {
        //$category = Category::findOrFail($category_id);
        $posts = $category->posts()->paginate(setting('admin.posts_per_page'));
        return view('blog',compact('posts'));
    }

    public function renderMyPostForm()
    {
        $categories = Category::pluck('title','id');
        return view('posts.create',compact('categories'));
    }

    //結帳路由方法
    public function checkout()
    {
        //建立訂單&明細
        $items_cart = \Cart::session(Auth::user()->id)->getContent();
        $order = Order::create([
            'owner_id' => Auth::user()->id
        ]);
        foreach ($items_cart as $item_cart) {
            ItemOrder::create(['order_id' => $order->id, 'item_id' => $item_cart->id, 'quantity' => $item_cart->quantity]);
        }

        //串接綠界金流做付款
        $formData = [
            'UserId' => Auth::user()->id, // 用戶ID , 非必須
            'MerchantTradeNo' => 'Goblin' . $order->id, //特店訂單編號
            'ItemDescription' => $order->title, //商品描述，可自己修改
            'ItemName' => 'Goblin Shop Items', //商品名稱，可自己修改
            'TotalAmount' => \Cart::session(Auth::user()->id)->getSubtotal(), //訂單總金額
            'PaymentMethod' => 'Credit', // ALL, Credit, ATM, WebATM
            'CustomField1' => $order->id, //自定義欄位1
            'CustomField2' => Auth::user()->id //自定義欄位2
        ];
        return $this->checkout->setPostData($formData)->send();
    }

    //綠界付完款轉址路由方法
    public function checkoutCallback(Request $request)
    {
        $userId = $request->CustomField2;
        \Cart::session($userId)->clear();
        $response = $request->all();
        $order = Order::find($response['CustomField1']);
        if ($response['RtnCode'] == 1) {
            if ($response['PaymentType'] == 'Credit_CreditCard') {
                $order->pay_type = 'credit';
            }
            $order->trade_no = $response['TradeNo']; //綠界訂單編號
            $order->pay_at = Carbon::now();
            $order->status = 'paid';
            $order->save();
            Log::info('訂單編號' . $order->id . '付款成功');
        } else {
            Log::error('訂單編號' . $order->id . '付款失敗');
        }
        return redirect('/'); //返回首頁
    }

    
}
