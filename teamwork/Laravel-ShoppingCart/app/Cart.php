<?php

namespace App;

use App\Order

class Cart
{
	protected $cart = new array();

	public function __construct($id)
	{
		$items = Order::where([['user_id', '=', $id],['complete', '=', false]]);

		foreach($items as $item)
		{
			array_push( $this->cart, $item);
		}
	}
}