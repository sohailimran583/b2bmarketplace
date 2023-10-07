@extends('layouts.app')

@section('content')

<div>
<h1>My Order Placed</h1>
@forelse($orders as  $order)
<h3>Product name {{ $order->product->name }}</h3><br>
<h3> Product  Description {{ $order->product->description  }}</h3><br>
Payment Status {{$order->payment_status}} <br>
 Amount Paid {{$order->amount}} <br> 
@empty
    No thing
@endforelse 


</div>

@endsection