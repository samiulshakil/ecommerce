@extends('front-end.master')

@section('mainContent')

<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Single</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
			<div class="">
				<div class="container" style=" padding-top: 40px; padding-bottom:30px">
					<div class="col-md-12">
						<h2 style="text-align: center; padding-bottom:30px">My Shopping Cart</h2>
						<table class="table table-bordered">
							<tr class="bg-primary text-center">
								<td>Id</td>
								<td>Name</td>
								<td>Image</td>
								<td>Quantity</td>
								<td>Price</td>
								<td>Action</td>
							</tr>
							@php($i=1)
							@php($sum = 0)
							@foreach($cartProduct as $cartProduct)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$cartProduct->name}}</td>
								<td><img src="{{asset($cartProduct->options->image)}}" width="50px" height="50px"></td>
								<td>
									{{ Form::open(['route' => 'update-cart', 'method' => 'POST']) }}
										<input type="number" name="qty" value="{{$cartProduct->qty}}">
										<input type="hidden" name="rowId" value="{{$cartProduct->rowId}}">
										<input type="submit" name="btn" value="update">
									{{ Form::close() }}
								</td>
								<td>${{$total = $cartProduct->price * $cartProduct->qty}}</td>
								<td class="text-center">
									<a href="{{route('delete-cart-item', ['rowId' =>$cartProduct->rowId])}}" onclick="return confirm('Are You Sure?')" class="btn btn-danger">Delete</span></a>
								</td>
							</tr>
							<?php $sum = $sum+$total ?>
							@endforeach
						</table>
						<hr>
						<table class="table table-bordered">
							<tr>
								<th>Item Total</th>
								<td>{{$sum}}</td>
							</tr>
							<tr>
								<th>Vat Total</th>
								<td>{{$vat = $sum+$sum*5/100}}</td>
							</tr>							
							<tr>
								<th>Grand Total</th>
								<td>{{$order_total = $sum+$vat}}</td>
								<?php Session::put('order_total', $order_total); ?>
							</tr>
						</table>
					</div>
				</div>
				<div class="row" style="padding-bottom: 30px">
					<div class="container">
						<div class="col-md-12">
							@if(Session::get('customerId') && Session::get('customerId'))
								<a href="{{route('checkout-payment')}}"><button class="btn btn-info">Check Out</button></a>
							@elseif(Session::get('customerId'))
								<a href="{{route('checkout/shipping')}}"><button class="btn btn-info">Check Out</button></a>
							@else
								<a href="{{route('checkout')}}"><button class="btn btn-info">Check Out</button></a>
							@endif
							<a href=""><button class="btn btn-success pull-right">Continue Shopping</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--content-->

@endsection