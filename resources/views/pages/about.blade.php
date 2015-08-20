@extends('app')

@section('content')

<h3>People I like:</h3>

@if (count($peoples))
	<ul>
	@foreach($peoples as $people)
		<li>{{ $people }}</li>
	@endforeach
	</ul>
@endif
<p>
So you've learned a bit about registering routes, and dispatching to controller methods, but how exactly do we pass data to our views? Let me show you!
</p>

@stop