@extends('thepanel::layouts.master')

@section('title')
	The Panel Backlog
@stop

@section('content')
	
	@foreach ($items as $link)

		<tr data-votes="{{ $link->vote_count }}">
			
			<td class="link-cell">
				<a href="{{ $link->url }}">{{ $link->title }}</a><br />
			</td>

		</tr>
	@endforeach

@stop