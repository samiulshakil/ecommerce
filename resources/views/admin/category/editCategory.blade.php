@extends('admin.master')

@section('title')
	Add New Category
@endsection


@section('mainContent')
	
<div class="container">
  <h2 class="text-center">Add Category</h2>
 <div class="text-center pb-3">
	<h4 style="color: green;">{{Session::get('message')}}</h4>
 </div>
  <div class="row">
  	<div class="col-md-8 offset-md-2">
  		  <form class="form-horizontal" action="{{route('update-category')}}" method="post">
  		  	{{ csrf_field() }}
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="email">Name:</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="email" placeholder="Enter Category Name" name="category_name" value="{{$categoryId->category_name}}">

		        <input type="hidden" class="form-control" id="email" placeholder="Enter Category Name" name="category_id" value="{{$categoryId->id}}">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="pwd">Description:</label>
		      <div class="col-sm-10">          
		        <textarea class="form-control" name="category_description" placeholder="Enter Category Description">{{$categoryId->category_description}}</textarea>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-4" for="pwd">Publication Status:</label>
		      <div class="col-sm-8 radio">          
		      	<label><input type="radio" name="publication_status" {{ $categoryId->publication_status == 1 ? 'checked': ''}} value="1">Published</label>
		      	<label><input type="radio" name="publication_status" {{$categoryId->publication_status == 0 ? 'checked': ''}} value="0">Unpublished</label>
		      </div>
		    </div>
		    <div class="form-group">        
		      <div class="col-sm-offset-2 col-sm-8">
		        <button type="submit" class="btn btn-success">Update Category Info</button>
		      </div>
		    </div>
		  </form>
  	</div>
  </div>
</div>


@endsection