@extends('layouts.master')

@section('content')
	<h1>{{$name}}</h1>
	{{$description}}

	@if (count($certifications) > 0)
	<h2>Certification list</h2>
		<ul>
		@foreach ($certifications as $c)
			<li><a href="/{{$slug}}/c/{{$c->slug}}">{{$c->name}}</a></li>
		@endforeach
		</ul>
	@endif

	@if (!empty($introduction))
	<h2>Introduction date</h2>
		@if (strtotime($introduction) < time())
			This exam have been available since {{$introduction}}.
		@else
			This exam have will be available after the {{$introduction}}.
		@endif
	@endif

	@if (!empty($retired))
	<h2>Riterement date</h2>
		@if (strtotime($retired) < time())
			This exam hve been available untill {{$retired}}.
		@else
			This exam will be available untill {{$retired}}.
		@endif
		
	@endif

	@if (count($languages) > 0)
	<h2>Language list</h2>
		<ul>
		@foreach ($languages as $l)
			<li>{{$l->name}}</li>
		@endforeach
		</ul>
	@endif

@stop