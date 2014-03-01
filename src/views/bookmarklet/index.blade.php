@extends('thepanel::layouts.master')

@section('title')
    The Panel bookmarklet
@stop

@section('content')

	<p>Your bookmarklet: <a href="javascript:(function()%7Bvar%20b%3Ddocument.createElement('script')%3Bb.setAttribute('src'%2C'http%3A%2F%2F{{ Config::get('thepanel::site.site_domain'); }}%2Fbookmarklet%2Fsource%3Fuser%3D{{ $publichash }}')%3Bdocument.body.appendChild(b)%7D)()">{{ Config::get('thepanel::site.bookmarklet_title'); }}</a></p>

@stop
