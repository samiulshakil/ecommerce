@extends('admin.master')

@section('title')
	Manage Brand
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
				      <th scope="col">Brand Name</th>
				      <th scope="col">Brand Description</th>
				      <th scope="col">Publication Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@php($i=1)
				  	@foreach($brands as $brand)
				    <tr>
				      <td>{{$i++}}</td>
				      <td>{{$brand->brand_name}}</td>
				      <td>{{$brand->brand_description}}</td>
				      <td>{{$brand->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
				      <td>
				      	@if($brand->publication_status == 1)
				      	<a href="{{ route('unpublished-brand', ['id' => $brand->id]) }}" class="btn btn-success"><span><i class="fa fa-arrow-up" aria-hidden="true"></i></span></a>
				      	@else
				      	<a href="{{route('published-brand', ['id'=>$brand->id])}}" class="btn btn-warning"><span><i class="fa fa-arrow-down" aria-hidden="true"></i></span></a>
				      	@endif
				      	<a href="{{ route('edit-brand', ['id' => $brand->id]) }}" class="btn btn-info"><span><i class="far fa-edit"></i></span></a>
				      	<a href="{{ route('delete-brand', ['id' => $brand->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger"><span><i class="fas fa-trash"></i></span></a>
				      </td>
				    </tr>
				  </tbody>
				  @endforeach
				</table>
			</div>
		</div>
	</div>
@endsection