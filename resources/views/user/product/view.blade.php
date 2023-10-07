@extends('layouts.app')

@section('content')
@include('layouts.flash-message')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">My Product</h4>
                 
                           
                   <a  class="btn btn-primary" href="{{route('user.add.product')}}"> Add New Product</a>
                     
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Image
                          </th>
                          <th>
                            Name 
                          </th>
                          <th>
                            Description
                          </th>
                          <th>
                            Price
                          </th>
                         
                          <th>
                            Category
                          </th>  
                          <th>
                           Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($products as $product)
                          
                   
                        <tr>
                          <td class="py-1" >
                            <img src="{{ asset($product->image) }}" alt="image" style="border-radius: 50%; width: 100px; height: 100px;" />
                        </td>
                          <td>
                            {{ $product->name }}
                          </td>
                          <td>
                            {{ $product->description }}
                          </td>
                          <td>
                            {{ $product->price}}
                          </td>
                          <td>
                            {{ $product->category->name}}
                          </td>
                        <td>
                          <form method="POST" action="{{ route('user.destory.product', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @endsection
