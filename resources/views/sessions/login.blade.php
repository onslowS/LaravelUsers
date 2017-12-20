@extends('master')

@section('content')
    <form method="POST" action="/login">
        {{ csrf_field() }}
        <label for="name">Email:</label>
        <input type="email" name="email">
        <label for="name">Password:</label>
        <input type="password" name="password">
        <button type="submit">LOG IN</button>
    </form>
@endsection