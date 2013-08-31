@extends('layouts.master')

@section('content')
	@if (count($exams) > 0)
	<h2>Exam list</h2>
		<ul>
	@endif
	@foreach ($exams as $e)
		<li><a href="/{{$e->provider->slug}}/e/{{$e->slug}}">{{$e->fullname}}</a></li>
	@endforeach
	@if (count($exams) > 0)
		</ul>
	@endif
@stop