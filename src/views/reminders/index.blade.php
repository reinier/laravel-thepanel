@extends('thepanel::frontpage.layout')

@section('title')
    Password reminder
@stop

@section('content')
	{{ Form::open(array('url' => '/password/remind')) }}
	<fieldset>
		<div class="form-group">
			<label for="email">@lang('thepanel::frontpage.youremail')</label>
			<input class="form-control" type="text" name="email" placeholder="Email" value="">
		</div>
	</fieldset>

	<fieldset>
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<button type="submit" class="btn btn-default">@lang('thepanel::frontpage.yescreatenewpassword')</button>
	</fieldset>
	{{ Form::close() }}
@stop

