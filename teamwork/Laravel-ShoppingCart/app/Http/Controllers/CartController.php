<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Orders;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $id;
    // protected $guestCart;

    public function __construct()
    {
        $this->middleware('auth');

        $this->id = Auth::id();
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
            $cart = Orders::where([['user_id', '=', $this->id],['complete', '=', false]])->get();

            dd($cart);
        }

        
        // return view('shop.cart', ['items' => $cart]);
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