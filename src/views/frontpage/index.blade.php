@extends('thepanel::frontpage.layout')

@section('title')
	The Panel Frontpage
@stop

@section('content')
	
	<ul id="published-links" class="clearfix">
	@foreach ($items as $link)
		<li class="clearfix">
			<div class="votes">
				@if (!$link->votes->isEmpty())
	                @foreach ($link->votes as $vote)
	                	<img src="http://www.gravatar.com/avatar/{{{ md5(strtolower(trim($vote->user->email))) }}}?s=32&d=identicon" title="{{{ $vote->user->name }}}" class="img-circle">
	                @endforeach
	            @endif
			</div>
			<a href="{{ $link->url }}" class="the_link">{{ $link->title }}</a>
			<br />
			<span class="link-domain">{{ $link->domain }}</span> - <span class="link-date">{{ $link->last_vote }}</span><span class="link-details-link"> - <a href="/frontpage/detail/{{ $link->id }}#disqus_thread">bekijk details</a></span>
		</li>
	@endforeach
	</ul>

@stop