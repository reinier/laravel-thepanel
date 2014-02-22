@extends('thepanel::frontpage.layout')

@section('title')
    Password reminder
@stop

@section('content')
	{{ Form::open(array('url' => '/password/reset')) }}
	<fieldset>
		
		<input type="hidden" name="token" value="{{ $token }}">
		
		<div class="form-group">
			<label for="email">@lang('thepanel::frontpage.youremail')</label>
			<input class="form-control" type="email" name="email">
		</div>
		
		<div class="form-group">
			<label for="password">@lang('thepanel::frontpage.yournewpassword')</label>
			<input class="form-control" type="password" name="password">
		</div>
		
		<div class="form-group">
			<label for="password_confirmation">@lang('thepanel::frontpage.yournewpasswordagain')</label>
			<input class="form-control" type="password" name="password_confirmation">
		</div>

	</fieldset>

	<fieldset>
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<button type="submit" class="btn btn-default">@lang('thepanel::frontpage.resetpassword')</button>
	</fieldset>
	{{ Form::close() }}
@stop