<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use Image;
use DB;

class productController extends Controller
{
    public function addProduct(){
    	$categories = Category::where('publication_status',1)->get();
    	$brands = Brand::where('publication_status',1)->get();
    	return view('admin.product.addProduct', ['categories' => $categories], ['brands' => $brands]);
    }

    protected function validateProductInfo($request){
    	$this->validate($request,[
    	   'product_name' => 'required'
    	]);
    }

    protected function productImageUpload($request){
    	$productImage = $request->file('product_image');
    	$imageName = $productImage->getClientOriginalName();
    	$directory = 'product-image/';
    	//$productImage->move($directory,$imageName); //move file into the directory and create a folder product image and save get client orginal name including index.php on public folder

    	$imgUrl = $directory.$imageName;
    	Image::make($productImage)->save($imgUrl);

    	return $imgUrl;
    }

    protected function saveProductInfo($request, $imgUrl){
    	$product = new Product();
    	$product->category_id = $request->category_id;
    	$product->brand_id = $request->brand_id;
    	$product->product_name = $request->product_name;
    	$product->product_price = $request->product_price;
    	$product->product_quantity = $request->product_quantity;
    	$product->short_description = $request->short_description;
    	$product->long_description = $request->long_description;
    	$product->product_image = $imgUrl;
    	$product->publication_status = $request->publication_status;
    	$product->save();
    }

    public function saveProduct(Request $request){

    	$this->validateProductInfo($request);

    	$imgUrl = $this->productImageUpload($request);

    	$this->saveProductInfo($request, $imgUrl);

    	return redirect('product/add')->with('message',' Product Saved Successfully...');

    }

    public function manageProduct(){
    	$products = DB::table('products')
    		->join('categories', 'products.category_id', '=', 'categories.id')
    		->join('brands', 'products.brand_id', '=', 'brands.id')
    		->select('products.*', 'categories.category_name', 'brands.brand_name')
    		->get();

    	return view('admin.product.manageProduct', ['products' => $products ]);
    }

    public function editProduct($id){
        $product = Product::find($id);
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status',1)->get();
        return view('admin.product.editProduct', [
            'product' => $product, 
            'categories' => $categories, 
            'brands' => $brands
        ]);
    }

    public function updateProduct(Request $request){

        $productImage = $request->file('product_image');

        if ($productImage) {
           $product = Product::find($request->product_id);
           unlink($product->product_image);

           $imageName = $productImage->getClientOriginalName();
           $directory = 'product-image/';
           $imgUrl = $directory.$imageName;
           Image::make($productImage)->save($imgUrl);

            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->product_image = $imgUrl;
            $product->publication_status = $request->publication_status;
            $product->save();

            return redirect('product/manage')->with('message',' Product Updated Successfully...');



        }else{
            $product = Product::find($request->product_id);
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->publication_status = $request->publication_status;
            $product->save();

            return redirect('product/manage')->with('message',' Product Updated Successfully...');
        }
    }



}
