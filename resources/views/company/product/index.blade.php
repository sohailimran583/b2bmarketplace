@extends('layouts.app')
 

@section('content')
    <div class="container">
        <h1 class="text-center">Your product</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="row">
            <div class="card-deck">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="card">
                            <img
                                src="{{ asset($product->image)}}"
                                alt="{{$product->name}}"
                                class="card-img-top"
                                height="400"
                            >
                            <div class="card-header">
                                {{$product->name}}
                                <span class="float-right">{{$product->price}}</span>
                            </div>
                            <div class="card-body">
                                <p>{!! $product->description !!}</p>
                            </div>
                            <div class="card-footer">
                            
                            </div>
                            
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection