@extends('layouts.app')

@section('content')
 @include('layouts.flash-message')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Companies</h4>
                  <h4 class="card-title">By ajax  =>  Add new Company</h4>
                   <a  class="btn btn-primary" href="{{route('admin.company.create')}}"> Add New Company</a>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Name 
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Created Account
                          </th> 
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                          
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            {{ $user->created_at->diffForHumans() }}
                          </td>
                          <td>
                            <form method="POST" action="{{ route('admin.company.destroy', $user->id) }}">
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
