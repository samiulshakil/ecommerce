@extends('front-end.master')


@section('mainContent')

<div class="container" style="padding: 50px 0px">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
				<div class="alert alert-info" style="text-align: center;" role="alert">Dear {{Session::get('customerName')}} Please Give us shipping Info</div>
				{{ Form::open(['route'=> 'new-shipping', 'method' => 'POST']) }}
					<div class="form-group">
						<input type="text" value="{{$customer->fname.' '.$customer->lname}}" class="form-control" name="fullname" placeholder="Enter Name">
					</div>					
					<div class="form-group">
						<input type="text" value="{{$customer->email}}" class="form-control" name="email" placeholder="Enter Email Name">
					</div>					
					<div class="form-group">
						<input type="text" value="{{$customer->phone}}" class="form-control" name="phone" placeholder="Enter Phone">
					</div>												
					<div class="form-group">
						<input type="text" value="{{$customer->address}}" class="form-control" name="address" placeholder="Enter Address">
					</div>					
					<div class="form-group">
						<input type="submit" class="form-control btn btn-success" name="" value="Save Shipping Info">
					</div>
				{{ Form::close() }}
			</div>
	</div>
</div>

@endsection