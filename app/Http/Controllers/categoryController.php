<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categoryController extends Controller
{
    public function index(){
    	return view('admin.category.addCategory');
    }

    public function saveCategory(Request $request){
        $this->validate($request, [
          'category_name'=> 'required',
        ]);
        
    	$category = new Category();
    	$category->category_name = $request->category_name;
    	$category->category_description = $request->category_description;
    	$category->publication_status = $request->publication_status;
    	$category->save();
    	return redirect('category/add')->with('message','Category Info Saved Successfully...');
    }

    public function manageCategory(){
    	$categories = Category::all();
    	return view('admin.category.manageCategory', ['categories' => $categories]);
    }

    public function unpublishedCategory($id){
    	$category = Category::find($id);
    	$category->publication_status = 0;
    	$category->save();
    	return redirect('category/manage')->with('message', 'Category Info Unpublished Successfully..');
    }

    public function publishedCategory($id){
    	$categoryPublished = Category::find($id);
    	$categoryPublished->publication_status = 1;
    	$categoryPublished->save();
    	return redirect('category/manage')->with('message', 'Category Info Published Successfully..');
    }

    public function editCategory($id){
    	$categoryId = Category::find($id);
    	return view('admin.category.editCategory', ['categoryId'=>$categoryId]);
    }

    public function updateCategory(Request $request){
    	$category = Category::find($request->category_id);
    	$category->category_name = $request->category_name;
    	$category->category_description = $request->category_description;
    	$category->publication_status = $request->publication_status;
    	$category->save();
    	return redirect('category/manage')->with('message', 'Category Updated Successfully');
    }

    public function deleteCategory($id){
    	$category = Category::find($id);
    	$category->delete();
    	return redirect('category/manage')->with('message', 'Category Deleted Successfully');
    }
}
