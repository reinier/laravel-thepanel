@extends('thepanel::frontpage.layout')

@section('title')
	The Panel detail
@stop

@section('content')
<div id="link-detail-page">
	<a href="{{ $link->url }}" class="the_link">{{ $link->title }}</a>
	<br />
	<span class="link-domain">{{ $link->domain }}</span> - <span class="link-date">{{ $link->last_vote }}</span><span class="link-details-link"></span>
	@if(!empty($link->reason))
	<p class="reason"><em>"{{ $link->reason }}"</em> &mdash; {{ $link->user->name }}</p>
	@endif
	<div class="votes">
		<p>Stemmen gekregen van:</p>
		@if (!$link->votes->isEmpty())
			@foreach ($link->votes as $vote)
				<img src="http://www.gravatar.com/avatar/{{{ md5(strtolower(trim($vote->user->email))) }}}?s=32&d=identicon" title="{{{ $vote->user->name }}}" class="img-circle">
			@endforeach
		@endif
	</div>
	<div id="comments">
		<h3>Reageer</h3>
		<div id="disqus_thread"></div>
		<script type="text/javascript">
				/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
	        var disqus_shortname = '{{ Config::get("thepanel::site.disqus_forum_shortname"); }}'; // required: replace example with your forum shortname

	        /* * * DON'T EDIT BELOW THIS LINE * * */
	        (function() {
	        	var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	        	dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	        	(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	        })();
	    </script>
	    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
	</div>
</div>
@stop
