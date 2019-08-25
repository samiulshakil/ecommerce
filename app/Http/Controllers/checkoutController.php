<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Mail;
use Session;
use Cart;
use App\Shipping;
use App\Order;
use App\Payment;
use App\OrderDetail;

class checkoutController extends Controller
{
    public function index(){
    	return view('front-end.checkout.checkout');
    }

    public function customerSignUp(Request $request){

    	$this->validate($request, [
    		'email' => 'required|string|email|max:255|unique:customers'
    	]);

    	$customer = new Customer();

    	$customer->fname = $request->fname;
    	$customer->lname = $request->lname;
    	$customer->email = $request->email;
    	$customer->password = bcrypt($request->password);
    	$customer->phone = $request->phone;
    	$customer->address = $request->address;
    	$customer->save();

    	$customerId = $customer->id;
    	Session::put('customerId', $customerId);
    	Session::put('customerName', $customer->fname.' '.$customer->lname);

    	$data = $customer->toArray();

    	Mail::send('front-end.mails.confirmation-mail', $data , function($message) use ($data){
    		$message->to($data['email']);
    		$message->subject('confirmation mail');
    	});


    	return redirect('checkout/shipping');
    }

    public function customerLogin(Request $request){
    	$customer = Customer::where('email', $request->email)->first();

    	if (password_verify($request->password, $customer->password)) {

		     Session::put('customerId', $customer->id);
    		 Session::put('customerName', $customer->fname.' '.$customer->lname);
    		 return redirect('checkout/shipping');

		} else {
		    return redirect('checkout')->with('message', 'Login Failed');
		}
    }

    public function customerLogout(){
    	Session::forget('customerId');
    	Session::forget('customerName');
    	return redirect('/');
    }

    public function newCustomerLogin(){
    	return view('front-end.customer.customer-login');
    }

    public function checkoutShipping(){
    	$customer = Customer::find(Session::get('customerId'));
    	return view('front-end.checkout.shipping', ['customer' => $customer]);
    }

    public function saveShipping(Request $request){
    	$shipping = new Shipping();

    	$shipping->fullname = $request->fullname;
    	$shipping->email = $request->email;
    	$shipping->phone = $request->phone;
    	$shipping->address = $request->address;
    	$shipping->save();

    	Session::put('shippingId', $shipping->id);
    	return redirect('checkout/payment');
    }

    public function paymentForm(){
    	return view('front-end.checkout.payment');
    }

        public function confirmOrder(Request $request){
    		$paymentType = $request->payment_type ;

    		if ($paymentType == 'Cash') {
    			
    			$order = new Order();
    			$order->customer_id = Session::get('customerId');
    			$order->shipping_id = Session::get('shippingId');
    			$order->order_total = Session::get('order_total');
    			$order->save();

    			$payment = new Payment();
    			$payment->order_id = $order->id;
    			$payment->payment_type = $paymentType;
    			$payment->save();

    			$cartProducts = Cart::content();
    			foreach ($cartProducts as $cartProduct) {
    				$orderDetail = new orderDetail();
    				$orderDetail->order_id = $order->id;
    				$orderDetail->product_id = $cartProduct->id;
    				$orderDetail->product_name = $cartProduct->name;
    				$orderDetail->product_price = $cartProduct->price;
    				$orderDetail->product_quantity = $cartProduct->qty;
    				$orderDetail->save();

    			}

    			Cart::destroy();

    			return redirect('complete/order');





    		} elseif ($paymentType == 'Paypal') {
    			
    		} elseif ($paymentType == 'Bkash') {
    			
    		}
    }


    public function completeOrder(){
    	return 'Successfully Completed Order';
    }




}
