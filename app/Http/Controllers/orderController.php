<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shipping;
use App\Payment;
use App\OrderDetail;
use App\Order;
use DB;
use PDF;

class orderController extends Controller
{
    public function manageOrder(){

    	$orders = DB::table('orders')
    	->join('customers', 'orders.customer_id', '=', 'customers.id')
    	->join('payments', 'orders.id', '=', 'payments.order_id')
    	->select('orders.*', 'customers.fname','customers.lname', 'payments.payment_type', 'payments.payment_status')
    	->get();

    	return view('admin.order.manageOrder', ['orders'=>$orders]);
    }

    public function viewOrderDetail($id){
    	$order = Order::find($id);
    	$customer = Customer::find($order->customer_id);
    	$shipping = Shipping::find($order->shipping_id);

    	$payment = Payment::where('order_id', $order->id)->first();
    	$orderDetail = OrderDetail::where('order_id', $order->id)->get();

    	return view('admin.order.view-order', [
    		'order' => $order,
    		'customer' => $customer,
    		'shipping' => $shipping,
    		'orderDetail' => $orderDetail,
    		'payment' => $payment
    	]);
    }    

    public function orderInvoice($id){
    	$order = Order::find($id);
    	$customer = Customer::find($order->customer_id);
    	$shipping = Shipping::find($order->shipping_id);

    	$payment = Payment::where('order_id', $order->id)->first();
    	$orderDetail = OrderDetail::where('order_id', $order->id)->get();

    	return view('admin.order.view-order-invoice', [
    		'order' => $order,
    		'customer' => $customer,
    		'shipping' => $shipping,
    		'orderDetail' => $orderDetail,
    		'payment' => $payment
    	]);
    }    

    public function orderDownload($id){

    	$order = Order::find($id);
    	$customer = Customer::find($order->customer_id);
    	$shipping = Shipping::find($order->shipping_id);

    	$payment = Payment::where('order_id', $order->id)->first();
    	$orderDetail = OrderDetail::where('order_id', $order->id)->get();

    	$pdf = PDF::loadView('admin.order.download-invoice', [
    		'order' => $order,
    		'customer' => $customer,
    		'shipping' => $shipping,
    		'orderDetail' => $orderDetail,
    		'payment' => $payment
    	]);

		return $pdf->stream('invoice.pdf');
    }    

    public function editOrder($id){
    	
    }    

    public function deleteOrder($id){

    }




}
