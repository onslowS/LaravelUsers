@extends('master')

@section('content')
    <p>You are  
    @if(Auth::check())
    a {{Auth::user()->type}}
    @else
    not a 
    @endif
    user.</p>
@endsection