@extends('master')

<h1>Weemo Contacts</h1>

@section('main')
<ul>
	@foreach($users as $user)
	
		<li>{{ $user->username }}</li>

	@endforeach
</ul>
@stop