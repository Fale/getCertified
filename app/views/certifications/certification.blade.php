@extends('layouts.master')

@section('content')
	<h1>{{$name}}</h1>
	{{$description}}

	<h2>Requirements</h2>
	To reach this certification you need to:
	{{$requirements}}

	@if (count($languages) > 0)
	<h2>Language list</h2>
		<ul>
		@foreach ($languages as $l)
			<li>{{$l->name}}</li>
		@endforeach
		</ul>
	@endif

	@if (strlen($requiredCertifications) > 1)
		<h2>Required certifications</h2>
    	{{$requiredCertifications}}
	@endif

	@if (strlen($requiredByCertifications) > 1)
		<h2>Certifications requiring this one</h2>
    	{{$requiredByCertifications}}
	@endif

@stop