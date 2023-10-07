<?php

namespace App\Http\Controllers\Payment;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Contracts\PaymentInterface;
use App\Http\Controllers\Controller;

class PaypallController extends Controller
{
    protected $paypalService;

    public function __construct(PaymentInterface $paypalService)
    {
        $this->paypalService = $paypalService;
    }
    public function checkout(Request $request){
        $payments =Product::find($request->id);
        $order = $this->paypalService->createOrder($payments->toArray());
        return redirect($order['links'][1]['href']);
    }

    public function cancel(){
        return to_route('home')->with('fail', 'You have cancel the payment');
    }


    public function success(Request $request){

       $response= $this->paypalService->captureOrder($request);
         if(isset($response['status']) && $response['status']=="COMPLETED"){
            $payment=Payment::where('user_id',auth()->id())->where('payment_id',$response['id'])->first();
            if(!$payment){
                return to_route('home')->with('fail', 'Something went wrong');
            }
            $payment->payment_status=$response['status'];
            $payment->email=$response['payer']['email_address'];
            $payment->payer_id = $response['payer']['payer_id'];
            $payment->currency=$response['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'];
            $payment->amount=$response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->save();
          return to_route('home')->with('status', 'Payment Done');
         }

    }
   
}
