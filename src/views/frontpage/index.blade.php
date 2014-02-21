@extends('thepanel::frontpage.layout')

@section('title')
	The Panel Frontpage
@stop

@section('content')
	
	<ul>
	@foreach ($items as $link)

		<li>
				<a href="{{ $link->url }}">{{ $link->title }}</a>
		</li>

	@endforeach
	</ul>

@stop