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

@stop