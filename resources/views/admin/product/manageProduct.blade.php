@extends('admin.master')

@section('title')
	Manage Product
@endsection


@section('mainContent')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 style="color: green;" class="text-center">{{Session::get('message')}}</h4>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Sl No.</th>
				      <th scope="col">Category Name</th>
				      <th scope="col">Brand Name</th>
				      <th scope="col">Product Image</th>
				      <th scope="col">Product Price</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@php($i=1)
				  	@foreach($products as $product)
				    <tr>
						<td>{{$i++}}</td>
						<td>{{$product->category_name}}</td>
						<td>{{$product->brand_name}}</td>
						<td><img src="{{asset($product->product_image)}}" height="50" width="50"></td>
						<td>{{$product->product_price}}</td>
						<td>

							<a href=""><button class="btn btn-info"><span><i class="fas fa-search-plus"></i></span></button></a>

							@if($product->publication_status == 1)
							<a href=""><button class="btn btn-primary"><span><i class="fas fa-arrow-up"></i></span></button></a>
							@else
							<a href=""><button class="btn btn-warning"><span><i class="fas fa-arrow-up"></i></span></button></a>
							@endif

							<a href="{{route('edit-product', ['id' => $product->id])}}"><button class="btn btn-success"><span><i class="fas fa-edit"></i></span></button></a>
							<a href="" onclick="confirm('Are You Sure?');"><button class="btn btn-danger"><span><i class="fas fa-trash"></i></span></button></a>
						</td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
			</div>
		</div>
	</div>
@endsection