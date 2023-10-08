@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto mt-2" id="message">
       
    
</div>
    
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
            <h3 class="card-title">Mail to <br>
                @foreach ($users as  $user)
                  Name =>  {{ $user->name }}  ||  email =>  {{ $user->email }}
                  <br>
                @endforeach
                <br>
            </h3>
                  <h4 class="card-title">Create Email Body</h4>
                  <form method="POST" action="{{ route('admin.notification.send') }}" id="sendNotificationForm">
                    @csrf
                    <input type="hidden" name="ids" id="selected_user_ids" value="{{ implode(',', $ids) }}">
                    <!-- ... Other form fields ... -->
                 
                          
                    <div class="form-group">
                      <label for="exampleInputName1">Enter Subject</label>
                      <input type="text" class="form-control" name="subject" placeholder="subject">
                      @if ($errors->has('subject'))
                         <span class="text-danger">{{ $errors->first('subject') }}</span>
                          @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Enter Body</label>
                        <textarea  class="form-control" name="body" placeholder="body"> </textarea>
                        @if ($errors->has('body'))
                           <span class="text-danger">{{ $errors->first('body') }}</span>
                            @endif
                      </div>
                       </div>
                       <button type="submit" class="btn btn-primary mr-2">Send Email</button>             
                  </form>
                </div>
              </div>
            </div>
            @endsection
