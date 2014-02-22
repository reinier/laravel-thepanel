@extends('thepanel::frontpage.layout')

@section('title')
	The Panel Frontpage
@stop

@section('content')
	
	<ul>
	@foreach ($items as $link)
		<li class="clearfix">
			<div class="votes">
					{{ $link->voted }}
			</div>
			<a href="{{ $link->url }}" class="the_link">{{ $link->title }}</a>
			<br />
			<span class="link-domain">{{ $link->domain }}</span> - <span class="link-date">{{ $link->last_vote }}</span><span class="link-details-link"> - <a href="/frontpage/detail/{{ $link->id }}#disqus_thread">bekijk details</a></span>
		</li>
	@endforeach
	</ul>

@stop