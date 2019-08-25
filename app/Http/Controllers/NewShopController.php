<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class NewShopController extends Controller
{
    public function index(){
    	
    	$products = Product::where('publication_status',1)
    								->orderBy('id', 'DESC')
    								->take(4)
    								->get();

    	return view('front-end.home.home', ['products' => $products]);
    }

    public function categoryProduct($id){
    	$categoryproducts = Product::where('category_id',$id)
    							->where('publication_status', 1)
    							->get();

    	return view('front-end.category.category-product',
    			['categoryproducts'=>$categoryproducts]);
    }

    public function productDetails($id){
    	$productDetails = Product::find($id);
    	return view('front-end.products.productDetails', ['productDetails' => $productDetails]);
    }

    public function mailUs(){
    	return view('front-end.mailUs.mailUs');
    }





}
