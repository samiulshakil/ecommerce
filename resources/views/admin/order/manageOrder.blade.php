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
				      <th scope="col">Customer Name</th>
				      <th scope="col">Order Total</th>
				      <th scope="col">Order Date</th>
				      <th scope="col">Order Status</th>
				      <th scope="col">Payment Type</th>
				      <th scope="col">Payment Status</th>
				      <th scope="col">Status</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@php($i=1)
				  	@foreach($orders as $order)
				    <tr>
				      <td>{{$i++}}</td>
				      <td>{{$order->fname.' '. $order->lname}}</td>
				      <td>${{$order->order_total}}</td>
				      <td>{{$order->created_at}}</td>
				      <td>{{$order->order_status}}</td>
				      <td>{{$order->payment_type}}</td>
				      <td>{{$order->payment_status}}</td>
				      <td>
				      	
				      	<a title="View Details" href="{{ route('view-order-detail', ['id' => $order->id]) }}" class="btn btn-success"><span><i class="fa fa-search-plus"></i></span></a>
				      	
				      	<a title="Invoice" href="{{ route('invoice-order', ['id' => $order->id]) }}" class="btn btn-warning"><span><i class="fas fa-search-minus"></i></span></a>
				      	
				      	<a title="Downlaod" href="{{ route('download-order', ['id' => $order->id]) }}" class="btn btn-info"><span><i class="fas fa-download"></i></span></a>

				      	<a title="Edit" href="{{ route('edit-order', ['id' => $order->id]) }}" class="btn btn-info"><span><i class="far fa-edit"></i></span></a>
				      	
				      	<a title="Delete" href="{{ route('delete-order', ['id' => $order->id]) }}" onclick="return confirm('Are You Sure?')" class="btn btn-danger"><span><i class="fas fa-trash"></i></span></a>
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				 
				</table>
			</div>
		</div>
	</div>
@endsection