<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\{Payment};
  
class OrderController extends Controller
{ 

    public function order_status(){
        $orders=Payment::with('product')->where('payment_status','COMPLETED')
        ->where('user_id',auth()->id())->get();
        return view('user.order.myorderstatus',compact('orders'));
    }
} 
