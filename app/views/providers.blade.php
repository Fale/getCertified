@extends('layouts.master')

@section('content')
	@if (count($providers) > 0)
	<h2>Provider list</h2>
		<ul>
	@endif
	@foreach ($providers as $p)
		<li><a href="/{{$p->slug}}">{{$p->name}}</a></li>
	@endforeach
	@if (count($providers) > 0)
		</ul>
	@endif
@stop