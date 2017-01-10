<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Orders;
use App\Products;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // protected $guestCart;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            //Capture user ID for order lookup
            $id = Auth::id();

            //Find current users active orders
            $orders = Orders::where([['complete', '=', false], ['user_id', '=', $id]])->get();

            //Array to store data for transfer to view
            $products = array();

            //Laravel arrays accept key/value pairs, count will act as a generic iterator for our 'keys'
            $count = 0;

            foreach($orders as $item)
            {
                $item = Products::where([['id', '=', $item->product_id]])->get();
                
                $products = array_add($products, $count, $item[0]['attributes']);

                $count++;
            }
        }
        
        //I'm sending product references for images and price, along with the orders to display.
        return view('shop.cart', ['products' => $products, 'order' => $orders]);
    }

    public function add($id)
    {
        if(Auth::check())
        {
            $item = Order::where([['user_id', '=', $this->id],['product_id', '=', $id],['complete', '=', false]])->get();

            if(count($item) == 1)
            {
                $item[0]->quantity = $item[0]->quantity + 1;
                $item[0]->save();
            }
            else
            {

            }
        }
    }
}