<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class CartController extends Controller
{
    public function getForCart()
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->with('product')->get();
        $total = $cart->sum(function ($item) {
            return $item->product->price * $item->quantity ?? 0;
        });

        return view('products.cart', ['cart' => $cart, 'total' => $total]);
    }

    public function store($id)
    {
        $user_id = Auth::user()->id;
        $result =  Cart::where('user_id', $user_id)->where('product_id', $id)->first();
        if ($result) {
            $result->first();
            $result->quantity += 1;
            $result->save();
        } else {
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->user_id = $user_id;
            $cart->save();
        }
        return redirect('/cart');
    }

    public function deleteFromCart($id)
    {
        $cart = Cart::where('product_id', $id);
        $cart->delete();
        return redirect('cart');
    }

    public function checkout()
    {
       $user_id = Auth::user()->id;
        $cart = Cart::where('user_id', $user_id)->with('product')->get();
        $total = $cart->sum(function ($item) {
            return $item->product->price * $item->quantity ?? 0;
        });
        return view('products.checkout',['cart' => $cart , 'total' => $total]);
    }


   public function storeOrderDetails(Request $request)
{
    $request->validate([
        'name' => ['required', 'max:50'],
        'email' => 'required|email',
        'address' => 'required',
        'phone' => ['required', 'digits_between:8,15'],
    ]);

    $user_id = Auth::id(); // أفضل من Auth::user()->id
    if (!$user_id) {
        return redirect('/login')->with('error', 'You must be logged in to place an order.');
    }

    $order = new Order();
    $order->name = $request->name;
    $order->email = $request->email;
    $order->address  = $request->address;
    $order->phone = $request->phone;
    $order->user_id = $user_id;
    $order->save();

    $cart = Cart::where('user_id', $user_id)->with('product')->get();

    foreach($cart as $items){
        $orderDetails = new OrderDetails();
        $orderDetails->product_id = $items->product->id; // ✅ مهم جداً
        $orderDetails->price = $items->product->price;
        $orderDetails->quantity = $items->quantity;
        $orderDetails->order_id = $order->id;
        $orderDetails->save();
    }

    Cart::where('user_id',$user_id)->delete();

    return redirect('/')->with('success', 'Order placed successfully!');
}


    public function getLatestOrders(){
        $user_id = Auth::user()->id;

     $orderDetails = Order::with('orderDetails')->where('user_id',$user_id)->get();
        return view('products.latestorders',[ 'orderDetails' => $orderDetails]);
    }
}
