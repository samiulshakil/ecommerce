<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class brandController extends Controller
{
    public function addBrand(){
    	return view('admin.brand.addBrand');
    }

    public function saveBrand(Request $request){
    	$this->validate($request, [
    		'brand_name'=> 'required',
    		'brand_description'=> 'required',
    		'publication_status'=> 'required',
    	]);

    	$brand = new Brand();

    	$brand->brand_name = $request->brand_name;
    	$brand->brand_description = $request->brand_description;
    	$brand->publication_status = $request->publication_status;
    	$brand->save();

    	return redirect('brand/add')->with('message', 'Brand Added Successfully...');
    }

    public function manageBrand(){
    	$brands = Brand::all();
    	return view('admin.brand.manageBrand', ['brands' => $brands]);
    }

    public function unpublishedBrand($id){
    	$brand = Brand::find($id);
    	$brand->publication_status = 0;
    	$brand->save();
    	return redirect('brand/manage')->with('message','Brand Published Status unpublished');
    }

    public function publishedBrand($id){
    	$brand = Brand::find($id);
    	$brand->publication_status = 1;
    	$brand->save();
    	return redirect('brand/manage')->with('message','Brand Unpublished Status unpublished');
    }

    public function editBrand($id){
    	$brand = Brand::find($id);
    	return view('admin.brand.editBrand', ['brand'=> $brand]);
    }

    public function updateBrand(Request $request){
    	$brand = Brand::find($request->brand_id);
    	$brand->brand_name = $request->brand_name;
    	$brand->brand_description = $request->brand_description;
    	$brand->publication_status = $request->publication_status;
    	$brand->save();
    	return redirect('brand/manage')->with('message', 'Brand Updated Successfully...');
    }

    public function deleteBrand($id){
    	$brand = Brand::find($id);
    	$brand->delete();
    	return redirect('brand/manage')->with('message', 'Brand Deleted Successfully...');
    }
}
