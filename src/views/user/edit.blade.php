@extends('thepanel::layouts.master')

@section('title')
	Edit your account
@stop

@section('content')
	
	{{ Form::open(array('url' => '/user/edit/'.Auth::user()->id)) }}
	<fieldset>
		<p><label for="name">Your name</label>
		<input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}">
		</p>
		<p><label for="name">Your bio</label>
		<textarea class="form-control" name="bio">{{ Auth::user()->bio }}</textarea>
		</p>
	</fieldset>
	<button type="submit" class="btn btn-default">Save</button>
	{{ Form::close() }}

	<hr />

	<p>
		<label>Your profile picture</label><br />
		<img src="http://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?s=128&d=identicon" class="img-circle"><br />
		<a href="http://gravatar.com">Edit at Gravatar</a> with email: {{Auth::user()->email}}
	</p>
@stop