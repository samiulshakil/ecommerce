@extends('front-end.master')


@section('mainContent')

<div class="container" style="padding: 50px 0px">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info" style="text-align: center;" role="alert">Dear {{Session::get('customerName')}} Please Select Payment System</div>
			{{ Form::open(['route'=> 'new-order', 'method' => 'POST']) }}
				<table class="table">
					<tr>
						<th>Cash On Delivery </th>
						<td><input type="radio" name="payment_type" value="Cash"> Cash On Delivery</td>
					</tr>					
					<tr>
						<th>Paypal </th>
						<td><input type="radio" name="payment_type" value="Paypal"> Paypal</td>
					</tr>
					<tr>
						<th>Bkash </th>
						<td><input type="radio" name="payment_type" value="Bkash"> Bkash</td>
					</tr>					
					<tr>
						<th> </th>
						<td><input type="submit" class="btn btn-success" name="btn" value="Confirm Order"></td>
					</tr>
				</table>
			{{ Form::close() }}
		</div>
	</div>
</div>

@endsection