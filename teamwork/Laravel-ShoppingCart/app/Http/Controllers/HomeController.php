<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Orders;
use App\User;
use App\Products;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $id = Auth::id();
        $user = User::where('id', $id)->get();
        $o = $user[0]['attributes']['orderCount'];
        $orders = Orders::where('complete', true)->get();

        $products = array();

        $count = 0;

        foreach($orders as $item)
        {
            $itemA = Products::where([['id', '=', $item->product_id]])->get();
            
            $products = array_add($products, $count, $itemA[0]['attributes']);

            $count++;
        }

        return view('user.orderhistory', ['products' => $products, 'orders' => $orders, 'count' => $count]);
    }
}
