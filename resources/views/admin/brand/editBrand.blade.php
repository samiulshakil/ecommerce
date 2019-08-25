@extends('admin.master')

@section('title')
	Add New Category
@endsection


@section('mainContent')
	
<div class="container">
  <h2 class="text-center">Add Brand</h2>
 <div class="text-center pb-3">
	<h4 style="color: green;">{{Session::get('message')}}</h4>
 </div>
  <div class="row">
  	<div class="col-md-8 offset-md-2">
 <!-- {{ Form::open(['route'=>'new-brand'], ['action'=>'POST'], ['class'=>'form-horizontal '] ) }} -->

  		  <form class="form-horizontal" action="{{route('update-brand')}}" method="post" id="testValid">

  		  	{{ csrf_field() }}
		    <div class="form-group {{ $errors->has('brand_name') ? ' has-error' : '' }}">
		      <label class="control-label col-sm-2" for="name">Brand Name:</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="email" placeholder="Enter Brand Name" name="brand_name" value="{{$brand->brand_name}}">
		        <input type="hidden" class="form-control" id="email" placeholder="Enter Brand Name" name="brand_id" value="{{$brand->id}}">
			        @if ($errors->has('brand_name'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('brand_name') }}</strong>
	                    </span>
	                @endif
				</div>

		    </div>
		    <div class="form-group {{ $errors->has('brand_description') ? ' has-error' : '' }}">
		      <label class="control-label col-sm-2" for="pwd">Description:</label>
		      <div class="col-sm-10">          
		        <textarea class="form-control" name="brand_description" placeholder="Enter Brand Description">{{$brand->brand_description}}</textarea>
		      </div>
	      	    @if ($errors->has('brand_description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('brand_description') }}</strong>
                    </span>
                @endif
		    </div>
		    <div class="form-group {{ $errors->has('publication_status') ? ' has-error' : '' }}">
		      <label class="control-label col-sm-4" for="pwd">Publication Status:</label>
		      <div class="col-sm-8 radio">          
		      	<label><input type="radio" {{$brand->publication_status == 1 ? 'checked' : ''}} name="publication_status" value="1">Published</label>
		      	<label><input type="radio" {{$brand->publication_status == 0 ? 'checked' : ''}} name="publication_status" value="0">Unpublished</label>
		      </div>
		      	@if ($errors->has('publication_status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('publication_status') }}</strong>
                    </span>
                @endif
		    </div>
		    <div class="form-group">        
		      <div class="col-sm-offset-2 col-sm-8">
		        <button type="submit" class="btn btn-success" name="submit">Save Brand Info</button>
		      </div>
		    </div>
		  </form>
		  <!-- {!! Form::close() !!} -->
  	</div>
  </div>
</div>


@endsection