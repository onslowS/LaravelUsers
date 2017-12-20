@extends('master')

@section('content')
	<style>
		table {
		    font-family: arial, sans-serif;
		    border-collapse: collapse;
		    width: 100%;
		}

		td, th {
		    border: 1px solid #dddddd;
		    text-align: left;
		    padding: 8px;
		}

		tr:nth-child(even) {
		    background-color: #dddddd;
		}
	</style>
	<table style="width:100%">
	<tr>
	    <th>ID</th>
	    <th>Name</th>
	    <th>Email</th>
	    <th>Type</th>
	    <th>Edit</th>
  	</tr>
	@foreach ($users as $user)
	<tr>
		<th>{{$user->id}}</th>
		<th>{{$user->name}}</th>
		<th>{{$user->email}}</th>
		<th>{{$user->type}}</th>
		<th><a href="/admin/{{$user->id}}"><button>Edit</button></a></th>
	</tr>
	@endforeach
	</table>
@endsection