<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
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

            //Array to store quantities
            $quantities = array();

            //Laravel arrays accept key/value pairs, count will act as a generic iterator for our 'keys'
            $count = 0;


            $total = 0;

            foreach($orders as $item)
            {
                $itemA = Products::where([['id', '=', $item->product_id]])->get();
                
                $products = array_add($products, $count, $itemA[0]['attributes']);

                $quantities = array_add($quantities, $count, $item['attributes']['quantity']);

                $count++;

                $total += $itemA[0]['attributes']['price'] * $item['attributes']['quantity'];
            }


            //dd($total);
            // foreach($products as $product) {
            //     $total += $product['attributes']['price'];
            //     //dd($product['attributes']['price']);
            // }
        }
        
        //I'm sending product references for images and price, along with the orders to display.
        return view('shop.cart', ['products' => $products, 'order' => $orders, 'quantities' => $quantities, 'total' => $total]);
    }

    public function add()
    {
        if(Auth::check())
        {

            $id = Auth::id();

            $itemId = Input::get('item');

            //Check database to see if order for this product already exists
            $order = Orders::where([['user_id', '=', $id],['product_id', '=', $itemId]])->get();

            //if product order exists, add another to quantity, because our functionality only allows user to add one product at a time
            if(count($order) > 0)
            {
                Orders::where([['user_id', '=', $id],['product_id', '=', $itemId]])->update(['quantity' => $order[0]['attributes']['quantity'] + 1]);

            } else { //else add new order to the orders database

                $order = new Orders;

                $order->user_id = $id;
                $order->product_id = $itemId;
                $order->quantity = 1;
                $order->complete = false;

                $order->save();
            }

            return redirect('cart');
        }
    }

    public function remove()
    {
        if(Auth::check())
        {
            $id = Auth::id();

            $itemId = Input::get('item');

            $order = Orders::where([['user_id', '=', $id],['product_id', '=', $itemId],['complete', '=', false]]);

            $order->delete();

            return redirect('cart');
        }
    }

    public function checkout()
    {
        $total = Input::get('total');
        return view('shop.checkout', ['total' => $total]);
    }

    public function charge()
    {
        $token = Input::get('stripeToken');
        $total = Input::get('total');

        \Stripe\Stripe::setApiKey("sk_test_UkIOZfIPW2LmcBcTYMmjDnpJ");

        $charge = \Stripe\Charge::create(array(
          "amount" => 500, //Change to $total 
          "currency" => "usd",
          "description" => "Example charge",
          "source" => $token,
        ));

        dd($charge);
    }
}