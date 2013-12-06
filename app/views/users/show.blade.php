@extend('master')

@section('main')
<ul>
	@foreach($users as $user)
	
		<li>{{ $user->username }}</li>

	@endforeach
</ul>
@endsection