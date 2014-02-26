@extends('thepanel::frontpage.layout')

@section('title')
	The Panel login
@stop

@section('content')

{{ Form::open(array('url' => '/frontpage/login')) }}
<fieldset>
<div class="form-group">
	{{ Form::label('email', Lang::get('thepanel::frontpage.yourusername')) . Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => Lang::get('thepanel::frontpage.yourusername'))) }}
</div>

<div class="form-group">
	{{ Form::label('password', Lang::get('thepanel::frontpage.yourpassword')) . Form::password('password', array('class' => 'form-control', 'placeholder' =>  Lang::get('thepanel::frontpage.yourpassword'))) }}
</div>
<div class="checkbox">
	{{ Form::checkbox('remember_me', 'yes', true); }} @lang('thepanel::frontpage.rememberme')
</div>
{{ Form::submit(Lang::get('thepanel::frontpage.login'), array('class' => 'btn btn-default')) }}
</fieldset>
{{ Form::close() }}

<p><small><a href="/password/remind">@lang('thepanel::frontpage.helpforgotpassword')</a></small></p>

@stop