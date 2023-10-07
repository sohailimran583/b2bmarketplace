@extends('layouts.app')

@section('content')
{{-- @include('layouts.flash-message') --}}
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Companies</h4>
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
                          <th>
                           Action
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
                            <button type="text" class="btn btn-danger">Delete</button>
                           <button type="text" value="{{ $user->id }}" class="btn btn-primary">Edit</button>
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
