<div class="max-w-lg mx-auto mt-2">

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>
@endif


@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error')}}
    </div>
@endif


</div>
