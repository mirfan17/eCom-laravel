<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();

        return view('product', ['products' => $data]);
    }

    public function detail($id)
    {
        $data = Product::find($id);

        return view('detail', ['product' => $data]);
    }

    public function search(Request $request)
    {
        $data = Product::where('name','like', '%' . $request->input('query') . '%')->get();

        return view('search', ['products' => $data]);
    }

    public function add_to_cart(Request $request)
    {
        if($request->session()->has('user'))
        {
            $cart = new Cart();

            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();

            return redirect('/');

            return "Hello";
        }
        else
        {
            return redirect('/login');
        }
    }

    static function cartItem()
    {
        $user_id = Session::get('user')['id'];

        $cartItems = Cart::where('user_id', $user_id)->count();

        return $cartItems;
    }

    public function cartList()
    {
        $user_id = Session::get('user')['id'];

        $data = DB::table('carts')
            ->join('products','carts.product_id','products.id')
            ->select('products.*', 'carts.id as cart_id')
            ->where('carts.user_id',$user_id)
            ->get();

        return view('cartlist', ['products' => $data]);
    }

    public function remove_cart($cart_id)
    {
       Cart::destroy($cart_id);

       return redirect()->back();
    }

    public function order()
    {
        $user_id = Session::get('user')['id'];

        $total = DB::table('carts')
            ->join('products','carts.product_id','products.id')
            ->where('carts.user_id',$user_id)
            ->sum('products.price');

        return view('order', ['total' => $total]);
    }

    public function orderPlace(Request $request)
    {
        $user_id = Session::get('user')['id'];

        $allCart = Cart::where('user_id', $user_id)->get();

        foreach($allCart as $cart)
        {
            $order = new Order();

            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->address = $request->address;
            $order->status = 'pending';
            $order->payment_method = $request->payment;
            $order->payment_status = 'pending';
            $order->save();
        }

        Cart::where('user_id', $user_id)->delete();

        return redirect('/');
    }

    public function myOrder()
    {
        $user_id = Session::get('user')['id'];

        $orders = DB::table('orders')
            ->join('products','orders.product_id','products.id')
            ->where('orders.user_id',$user_id)
            ->get();

        return view('myorder', ['orders' => $orders]);
    }
}
