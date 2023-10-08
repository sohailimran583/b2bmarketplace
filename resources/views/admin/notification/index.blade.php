@extends('layouts.app')

@section('content')
 @include('layouts.flash-message')
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Users And Companies
                  </h4>
                  <div class="table-responsive">
                    <form method="POST" action="{{ route('admin.notification.create') }}" id="sendNotificationForm">
                      @csrf
                      <button type="submit" class="btn btn-primary">Send Email</button>
                  </form>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                             
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Email
                          </th> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <td><input type="checkbox" class="row-checkbox" data-user-id="{{ $user->id }}"></td>
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                            {{ $user->email }}
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
           @section('script')
           <script>
        
        document.addEventListener('DOMContentLoaded', function() {
        const sendNotificationForm = document.getElementById('sendNotificationForm');
        const checkboxes = document.querySelectorAll('.row-checkbox');
        sendNotificationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const selectedIds = [];
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedIds.push(checkbox.getAttribute('data-user-id'));
                }
            });
            selectedIds.forEach(userId => {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'id[]'; 
                hiddenInput.value = userId;
                sendNotificationForm.appendChild(hiddenInput);
            });
            sendNotificationForm.submit();
        });
    });
           </script>
           @endsection