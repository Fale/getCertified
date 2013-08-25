@extends('layouts.master')

@section('content')
	<h1>{{$name}}</h1>
	{{$description}}
	@if (count($certifications) > 0)
	<h2>Certification list</h2>
		<ul>
	@endif
	@foreach ($certifications as $c)
		<li><a href="/{{$slug}}/c/{{$c->slug}}">{{$c->name}}</a></li>
	@endforeach
	@if (count($certifications) > 0)
		</ul>
	@endif

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
@stop