@extends('admin.master')

@section('title')
	Manage Category
@endsection


@section('mainContent')
	<style type="text/css">
		.invoice-title h2, .invoice-title h3 {
		    display: inline-block;
		}

		.table > tbody > tr > .no-line {
		    border-top: none;
		}

		.table > thead > tr > .no-line {
		    border-bottom: none;
		}

		.table > tbody > tr > .thick-line {
		    border-top: 2px solid;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="container">
				    <div class="row">
				        <div class="col-xs-12 col">
				    		<div class="invoice-title">
				    			<h2>Invoice</h2><h3 class="pull-right">Order {{$order->id}}</h3>
				    		</div>
				    		<hr>
				    		<div class="row">
				    			<div class="col-xs-6 col text-left">
				    				<address>
				    				<strong>Billed To:</strong><br>
				    					{{$customer->fname. ''. $customer->lname}}<br>
				    					{{$customer->address}}<br>
										{{$customer->phone}}
				    				</address>
				    			</div>
				    			<div class="col-xs-6 col col text-right">
				    				<address>
				        			<strong>Shipped To:</strong><br>
				    					{{$shipping->fullname}}<br>
				    					{{$shipping->address}}<br>
										{{$shipping->phone}}
				    				</address>
				    			</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-xs-6 col">
				    				<address>
				    					<strong>Payment Method:</strong><br>
				    					{{$payment->payment_type}}<br>
				    					{{$customer->email}}
				    				</address>
				    			</div>
				    			<div class="col-xs-6 col text-right" style="float: right;">
				    				<address>
				    					<strong>Order Date:</strong><br>
				    					{{$order->created_at}}<br><br>
				    				</address>
				    			</div>
				    		</div>
				    	</div>
				    </div>
    
				    <div class="row">
				    	<div class="col-md-12">
				    		<div class="panel panel-default">
				    			<div class="panel-heading">
				    				<h3 class="panel-title"><strong>Order summary</strong></h3>
				    			</div>
				    			<div class="panel-body">
				    				<div class="table-responsive">
				    					<table class="table table-condensed">
				    						<thead>
				                                <tr>
				        							<td><strong>Item</strong></td>
				        							<td class="text-center"><strong>Price</strong></td>
				        							<td class="text-center"><strong>Quantity</strong></td>
				        							<td class="text-right"><strong>Totals</strong></td>
				                                </tr>
				    						</thead>
				    						<tbody>
				    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
				    							@foreach($orderDetail as $orderDetail)
				    							<tr>
				    								<td>{{$orderDetail->product_name}}</td>
				    								<td class="text-center">${{$orderDetail->product_price}}</td>
				    								<td class="text-center">{{$orderDetail->product_quantity}}</td>
				    								<td class="text-right">${{$orderDetail->product_quantity * $orderDetail->product_price}}</td>
				    							</tr>
				    							@endforeach
				    							<tr>
				    								<td class="thick-line"></td>
				    								<td class="thick-line"></td>
				    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
				    								<td class="thick-line text-right">{{$order->order_total}}</td>
				    							</tr>
				    							<tr>
				    								<td class="no-line"></td>
				    								<td class="no-line"></td>
				    								<td class="no-line text-center"><strong>Shipping</strong></td>
				    								<td class="no-line text-right">${{$shipping = 5}}</td>
				    							</tr>
				    							<tr>
				    								<td class="no-line"></td>
				    								<td class="no-line"></td>
				    								<td class="no-line text-center"><strong>Total</strong></td>
				    								<td class="no-line text-right">{{$order->order_total + $shipping}}</td>
				    							</tr>
				    						</tbody>
				    					</table>
				    				</div>
				    			</div>
				    		</div>
				    	</div>
				    </div>
				</div>

			</div>
		</div>
	</div>

@endsection