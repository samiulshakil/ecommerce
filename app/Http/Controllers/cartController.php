<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;


class cartController extends Controller
{
    public function addToCart(Request $request){
    	$product = Product::find($request->id);

    	Cart::add([
    		'id' => $request->id,
    		'name' => $product->product_name,
    		'price' => $product->product_price,
    		'qty' => $request->qty,
    		'options' => [
    			'image' => $product->product_image ]
    	]);
    	return redirect('show/cart');
    }

    public function showCart(){
    	$cartProduct = Cart::content();
    	return view('front-end.cart.showCart', ['cartProduct' => $cartProduct]);
    }    

    public function updateCart(Request $request){
    	Cart::update($request->rowId, $request->qty);
    	return redirect('show/cart');
    }

    public function deleteCart($id){
    	Cart::remove($id);
    	return redirect('show/cart');
    }
}
