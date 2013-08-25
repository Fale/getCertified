@extends('layouts.master')

@section('content')
	@if (count($certifications) > 0)
	<h2>Certification list</h2>
		<ul>
	@endif
	@foreach ($certifications as $c)
		<li><a href="/{{$c->provider->slug}}/c/{{$c->slug}}">{{$c->name}}</a></li>
	@endforeach
	@if (count($certifications) > 0)
		</ul>
	@endif
@stop