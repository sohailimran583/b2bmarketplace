@extends('layouts.app')

@section('content')
@php 
$post =['sds'];
@endphp
@each('user.order.order',$post ,'post' )
<div>
<h1>My Order Placed</h1>
@forelse ($orders as  $order)
<h3>Product name {{ $order->product->name }}</h3><br>
<h3> Product  Description {{ $order->product->description  }}</h3><br>
Payment Status {{$order->payment_status}} <br>
 Amount Paid {{$order->amount}} <br> 
 <h3> <a href="{{route('user.product.review')}}">Review for this product</a> </h3>
@empty
    No thing
@endforelse 


</div>

@endsection