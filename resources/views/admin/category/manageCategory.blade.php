@extends('admin.master')

@section('title')
	Manage Category
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
				      <th scope="col">Categroy Name</th>
				      <th scope="col">Category Description</th>
				      <th scope="col">Publication Status</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@php($i=1)
				  	@foreach($categories as $category)
				    <tr>
				      <td>{{$i++}}</td>
				      <td>{{$category->category_name}}</td>
				      <td>{{$category->category_description}}</td>
				      <td>{{$category->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
				      <td>
				      	@if($category->publication_status == 1)
				      	<a href="{{ route('unpublished-category', ['id' => $category->id]) }}" class="btn btn-success"><span><i class="fa fa-arrow-up" aria-hidden="true"></i></span></a>
				      	@else
				      	<a href="{{route('published-category', ['id'=>$category->id])}}" class="btn btn-warning"><span><i class="fa fa-arrow-down" aria-hidden="true"></i></span></a>
				      	@endif
				      	<a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn btn-info"><span><i class="far fa-edit"></i></span></a>
				      	
				      	<a href="{{ route('delete-category', ['id' => $category->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger"><span><i class="fas fa-trash"></i></span></a>
				      </td>
				    </tr>
				  </tbody>
				  @endforeach
				</table>
			</div>
		</div>
	</div>
@endsection