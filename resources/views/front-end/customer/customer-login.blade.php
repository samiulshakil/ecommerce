@extends('front-end.master')

@section('mainContent')

<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Login</a>/ <span>Registration</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
	<div class="container" style="padding: 70px 0px">
		<div class="row">
			<div class="col-md-12">
				<div class="well well-lg" style="margin-top: 50px;margin-bottom: 50px;text-align: center;">You have to Login to buy this product or Registration</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-info" style="text-align: center;" role="alert">Registration</div>
				{{ Form::open('method' => 'POST']) }}
					<div class="form-group">
						<input type="text" class="form-control" name="fname" placeholder="Enter First Name">
					</div>					
					<div class="form-group">
						<input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
					</div>					
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Enter Email">
					</div>												
					<div class="form-group">
						<input type="text" class="form-control" name="password" placeholder="Enter Password">
					</div>	
					<div class="form-group">
						<input type="text" class="form-control" name="phone" placeholder="Enter Phone">
					</div>					
					<div class="form-group">
						<input type="text" class="form-control" name="address" placeholder="Enter Address">
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-success" name="">
					</div>
				{{ Form::close() }}
			</div>
			<div class="col-md-6">
				<div class="alert alert-info" style="text-align: center;" role="alert">Login</div>
				<h4 class="text-center">{{Session::get('message')}}</h4><br>
				{{ Form::open( 'method' => 'POST']) }}
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Enter Email">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="password" placeholder="Enter Password">
					</div>
					<div class="form-group">
						<input type="submit" class="form-control btn btn-info" name="">
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>

@endsection