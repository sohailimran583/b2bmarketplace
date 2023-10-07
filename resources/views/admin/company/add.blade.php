@extends('layouts.app')
@section('content')
<div class="max-w-lg mx-auto mt-2" id="message">
       
    
</div>
    
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create New Company</h4>
                  <form id="companyForm" name="companyForm" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Company Name</label>
                      <input type="text" class="form-control" name="name" placeholder="Name">
                      @if ($errors->has('name'))
                         <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Company Email</label>
                        <input  type="email" class="form-control" name="email" placeholder="email">
                        @if ($errors->has('email'))
                           <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Password</label>
                        <input type="password"  class="form-control" name="password" placeholder="password">
                        @if ($errors->has('password'))
                           <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                      </div>
                    <button type="text" id="create"  class="btn btn-primary mr-2">Create Company</button>
             
                  </form>
                </div>
              </div>
            </div>
            @endsection
    @section('script')
    <script>
    $('#create').click(function(e) {
    e.preventDefault(); 
    create_company();
    });
        
    function  create_company(){
    $.ajax({
        data: $('#companyForm').serialize(),
        url: "{{ route('admin.company.store') }}",
        type: "POST",
        success: function (response) {
            $('.form-group').find('.error-container').remove();
         $('.form-control').val('');
        $('#message').html(`<div class="alert alert-${response.error}" id="message">${response.message}</div>`);
        },
        error: function (response) {
        appendValidationErrors(response.responseJSON.errors);
           
        }
      }); 
    }
    function appendValidationErrors(errors) {
    $.each(errors, function(field, messages) {
        var $field = $('[name="' + field + '"]');
        var $errorContainer = $field.closest('.form-group').find('.error-container');
        if (!$errorContainer.length) {
            $errorContainer = $('<div class="error-container"></div>');
            $field.closest('.form-group').append($errorContainer);
        }
        $errorContainer.empty();
        $.each(messages, function(index, message) {
            $errorContainer.append('<span class="text-danger">' + message + '</span><br>');
        });
    });
}
        </script>
        @endsection