@extends('layouts.app')
@section('content')

Admin  dashboard <br>
<a href="{{ route('admin.company.index') }}"><h1>View Companies</h1></a><br>
 
<a href="{{ route('admin.user.list') }}"><h1>Notifcation tab </h1></a><br>

@endsection