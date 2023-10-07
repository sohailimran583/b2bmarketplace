<?php
namespace App\Services;

use App\Contracts\PaymentInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use App\Models\Payment;
use GuzzleHttp\Psr7\Request;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalPaymentService implements PaymentInterface
{
  

    public function createOrder(array $orderData)
    {
        $provider = new PayPalClient([]);
        $token =  $provider->getAccessToken();
                  $provider->setAccessToken($token);
        $order=   $provider->createOrder([
            'intent'=>'CAPTURE',
            'purchase_units'=>[
            [
            'amount' =>[
                    'currency_code'=>'USD',
                    'value'=>$orderData['price']
                ]
            ]
                ],
                'application_context'=>[ 
                    'cancel_url'=>route('payment.cancel'),
                    'return_url'=>route('payment.success'),
                ]
        ]);
         
        if($order['status'] =="CREATED"){
            $this->createdOrder($order,$orderData);
            return $order;
        }
       

    }

    public function captureOrder($request)
    {
        
        $provider=new PayPalClient([]);
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response=$provider->capturePaymentOrder($request['token']);
        return $response;
    }

     public function createdOrder($order,$orderData){
        Payment::create([
            'user_id'=>auth()->id(),
            'payment_id'=>$order['id'],
            'payment_status' =>'IN_PROCESS',
            'amount'=>$orderData['price'],
            'product_id'=>$orderData['id'],
            
        ]);
     }


  



}









?>