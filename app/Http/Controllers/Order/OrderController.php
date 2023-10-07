<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product,CoreSetting,Payment};

class OrderController extends Controller
{
    public function order(){
        $commission = CoreSetting::getSetting('commission');
        $orders=Product::with('orders','orders.user')->where('user_id',auth()->id())->get();
        
        return view ('user.order.order',['orders'=>$orders,'commission'=>$commission]);
    } 

    public function order_status(){
        $orders=Payment::with('product')->where('payment_status','COMPLETED')
        ->where('user_id',auth()->id())->get();
     
        return view('user.order.myorderstatus',compact('orders'));
    }
} 
