@extends('admin.master')

@section('title')
	Manage Category
@endsection


@section('mainContent')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 style="color: red;" class="text-center">{{Session::get('message')}}</h4>
				<h4 style="color: green;" class="text-center">Order Info</h4>
				<table class="table border">
					<tr>
						<th>Order Id</th>
						<td>{{$order->id}}</td>
					</tr>
					<tr>
						<th>Order Total</th>
						<td>{{$order->order_total}}</td>
					</tr>					
					<tr>
						<th>Order Status</th>
						<td>{{$order->order_status}}</td>
					</tr>					
					<tr>
						<th>Created</th>
						<td>{{$order->created_at}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 style="color: green;" class="text-center">Customer Info For This Order</h4>
				<table class="table border">
					<tr>
						<th>Customer Name</th>
						<td>{{$customer->fname.' '.$customer->lname}}</td>
					</tr>
					<tr>
						<th>Customer Email</th>
						<td>{{$customer->email}}</td>
					</tr>					
					<tr>
						<th>Customer Phone</th>
						<td>{{$customer->phone}}</td>
					</tr>					
					<tr>
						<th>Customer Address</th>
						<td>{{$customer->address}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

		<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 style="color: green;" class="text-center">Shipping Info</h4>
				<table class="table">
					<tr>
						<th>Name</th>
						<td>{{$shipping->name}}</td>
					</tr>
					<tr>
						<th>Customer Email</th>
						<td>{{$shipping->fullname}}</td>
					</tr>					
					<tr>
						<th>Customer Phone</th>
						<td>{{$shipping->phone}}</td>
					</tr>					
					<tr>
						<th>Shipping Address</th>
						<td>{{$shipping->address}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 style="color: green;" class="text-center">Payment Info</h4>
				<table class="table">
					<tr>
						<th>Payment Type</th>
						<td>{{$payment->payment_type}}</td>
					</tr>
					<tr>
						<th>Payment Status</th>
						<td>{{$payment->payment_status}}</td>
					</tr>					
				</table>
			</div>
		</div>
	</div>

		<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 style="color: green;" class="text-center">Products Info</h4>
				<table class="table border">
					<tr>
						<th>Product Id</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th>Product Quantity</th>
						<th>Total Price</th>
					</tr>
					@foreach($orderDetail as $orderDetail)
					<tr>
						<td>{{$orderDetail->id}}</td>
						<td>{{$orderDetail->product_name}}</td>
						<td>{{$orderDetail->product_price}}</td>
						<td>{{$orderDetail->product_quantity}}</td>
						<td>{{$orderDetail->product_quantity * $orderDetail->product_price }}</td>
					</tr>	
					@endforeach			
				</table>
			</div>
		</div>
	</div>
@endsection