@extends('layouts.app')
@section('content')
@include('layouts.flash-message')
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create New Product</h4>
                  <form class="forms-sample" method="post" action="{{ route('company.product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Name">
                      @if ($errors->has('name'))
                         <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Category</label>
                        <select class="form-control" name="category">
                          <option selected disabled>Select Category</option>
                          @foreach ($categoryies as $category)
                          <option value="{{ $category->id }}">{{$category->name }}</option> 
                          @endforeach
                        </select>
                        @if ($errors->has('category'))
                          <span class="text-danger">{{ $errors->first('category') }}</span>
                             @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Price</label>
                        <input type="number" class="form-control" name="price"  placeholder="Price" step="1" min="0" required>
                        @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                          @endif
                      </div>
                    <div class="form-group">
                      <label>Image Upload</label>
                      <input type="file" name="file" class="file-upload-default">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" name="description"  rows="4"></textarea>
                      @if ($errors->has('description'))
                       <span class="text-danger">{{ $errors->first('description') }}</span>
                      @endif
                     </div>
                    <button type="submit" class="btn btn-primary mr-2">Create Prouct</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            @endsection