@extends('master')

@section('content')
	<form method="post" action="/myprofile">
        {{ csrf_field() }}
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{Auth::user()->name}}">
        <label for="email">Email:</label>
        <input type="text" name="email" value="{{Auth::user()->email}}">
        <label for="type">Type:</label>
        <select name="type">
        	@if(Auth::user()->type == "regular")
			<option value="regular" selected>Regular</option>
			<option value="admin">Admin</option>
			@else
			<option value="regular">Regular</option>
			<option value="admin" selected>Admin</option>
			@endif
		</select>
        <button type="submit">SUBMIT</button>
    </form>
@endsection