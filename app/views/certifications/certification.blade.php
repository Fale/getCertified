@extends('layouts.master')

@section('content')
	<h1>{{$name}}</h1>
	{{$description}}

	@if (count($exams) > 0)
	<h2>Exam list</h2>
		<ul>
	@endif
	@foreach ($exams as $e)
		<li><a href="/{{$slug}}/e/{{$e->slug}}">{{$e->name}}</a></li>
	@endforeach
	@if (count($exams) > 0)
		</ul>
	@endif

	@if (count($languages) > 0)
	<h2>Language list</h2>
		<ul>
	@endif
	@foreach ($languages as $l)
		<li>{{$l->name}}</li>
	@endforeach
	@if (count($languages) > 0)
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