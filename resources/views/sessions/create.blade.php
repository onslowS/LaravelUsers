@extends('master')

@section('content')
<form method="POST" action="/register">
	{{ csrf_field() }}
	<label for="name">Email:</label>
	<input type="email" name="email">
	<label for="name">Name:</label>
	<input type="text" name="name">
	<label for="name">Password:</label>
	<input type="password" name="password">
	<label for="type">Type:</label>
	<select name="type">
		<option value="regular">Regular</option>
		<option value="admin">Admin</option>
	</select>
	<button type="submit">REGISTER</button>
</form>
@endsection