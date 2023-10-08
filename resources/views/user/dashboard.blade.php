@extends('layouts.app')

@section('content')
Dashboard
 <h1><a href="{{ route('product.buy') }}">Buy Products</a></h1> <br>

<h1><a href="{{ route('user.myorder.status') }}">My Order Status</a></h1> <br> 
@endsection

