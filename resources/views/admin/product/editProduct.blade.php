@extends('admin.master')

@section('title')
	Add New Product
@endsection


@section('mainContent')
	
<div class="container">
  <h2 class="text-center">Add Product</h2>
 <div class="text-center pb-3">
	<h4 style="color: green;">{{Session::get('message')}}</h4>
 </div>
  <div class="row">
  	<div class="col-md-9 offset-md-2">
 <!-- {{ Form::open([ 'route'=>'new-brand', 'action'=>'POST', 'class'=>'form-horizontal' ] ) }} -->

  		  <form class="form-horizontal" action="{{route('update-product')}}" method="post" id="" enctype="multipart/form-data" name="editProductForm">

  		  	{{ csrf_field() }}

		    <div class="form-group {{ $errors->has('product_name') ? ' has-error' : '' }}">
		      <label class="control-label col-md-3" for="name">Category Name:</label>
		      <div class="col-md-9">
		        <select class="form-control" name="category_id">
		        	<option>--Select Brand --</option>
		        	@foreach($categories as $category)
		        	<option value="{{$category->id}}">{{$category->category_name}}</option>
		        	@endforeach
		        </select>
			   </div>
		    </div>

		   <div class="form-group">
		      <label class="control-label col-md-3" for="name">Brand Name:</label>
		      <div class="col-md-9">
		        <select class="form-control" name="brand_id">
		        	<option>--Select Brand --</option>
		        	@foreach($brands as $brand)
		        	<option value="{{$brand->id}}">{{$brand->brand_name}}</option>
		        	@endforeach
		        </select>
			   </div>
		    </div>

		    <div class="form-group ">
		      <label class="control-label col-md-3" for="pwd">Product Name</label>
		      <div class="col-md-9">          
		        <input type="text" class="form-control" value="{{$product->product_name}}" name="product_name" placeholder="Enter product Name">
		        <input type="hidden" value="{{$product->id}}" class="form-control" name="product_id" placeholder="Enter product Name">
		        <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : '' }}</span>
		      </div>
		    </div>		    

		    <div class="form-group ">
		      <label class="control-label col-md-3" for="pwd">Product Price</label>
		      <div class="col-md-9">          
		        <input type="number" class="form-control" value="{{$product->product_price}}" name="product_price" placeholder="Enter product price">
		      </div>
		    </div>		    

		    <div class="form-group ">
		      <label class="control-label col-md-3" for="pwd">Product Quantity</label>
		      <div class="col-md-9">          
		        <input type="number" class="form-control" name="product_quantity" placeholder="Enter product Quantity" value="{{$product->product_quantity}}">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-md-3" for="pwd">Short Description:</label>
		      <div class="col-md-9">          
		        <textarea class="form-control" name="short_description" placeholder="Enter Short Description">{{$product->short_description}}</textarea>
		      </div>
		    </div>		    

		    <div class="form-group">
		      <label class="control-label col-md-3" for="pwd">Long Description:</label>
		      <div class="col-md-9">          
		        <textarea class="form-control" name="long_description" placeholder="Enter Long Description">{{$product->long_description}}</textarea>
		      </div>
		    </div>		    

		    <div class="form-group">
		      <label class="control-label col-md-3" for="pwd">Product Image</label>
		      <div class="col-md-9">          
		        <input type="file"  name="product_image" accept="image/*"><img width="50px" height="50" src="{{asset($product->product_image)}}">
		      </div>
		    </div>

		    <div class="form-group {{ $errors->has('publication_status') ? ' has-error' : '' }}">
		      <label class="control-label col-md-3" for="pwd">Publication Status:</label>
		      <div class="col-md-9 radio">          
		      	<label><input type="radio" name="publication_status" {{$product->publication_status == 1 ? 'checked' : ''}} value="1">Published</label>
		      	<label><input type="radio" name="publication_status" {{$product->publication_status == 0 ? 'checked' : ''}} value="0">Unpublished</label>
		      </div>
		      	@if ($errors->has('publication_status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('publication_status') }}</strong>
                    </span>
                @endif
		    </div>
		    <div class="form-group">        
		      <div class="col-md-offset-4 col-md-9">
		        <button type="submit" class="btn btn-success" name="submit">Update Product Info</button>
		      </div>
		    </div>
		  </form>
		  <!-- {!! Form::close() !!} -->
  	</div>
  </div>
</div>
<script type="text/javascript">
	document.forms['editProductForm'].elements['category_id'].value = '{{$product->category_id}}';
	document.forms['editProductForm'].elements['brand_id'].value = '{{$product->brand_id}}';
</script>

@endsection