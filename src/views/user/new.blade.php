@extends('thepanel::layouts.master')

@section('title')
	Register new user
@stop

@section('content')
	
	@if($errors->has())
		@foreach ($errors->all() as $error)
			<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $error }}
            </div>
		@endforeach
	@endif

	{{ Form::open(array('url' => '/user/new')) }}
	<fieldset>
		<div class="form-group">
			{{ Form::label('name', 'Your name') . Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Name')) }}	
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Your email address') . Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
		</div>
		<div class="form-group">
			{{ Form::label('username', 'Your prefered username') . Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => 'Username')) }}
		</div>
	</fieldset>
	<fieldset>
		<div class="form-group">
			{{ Form::label('password', 'Your prefered password') . Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
		</div>
		<div class="form-group">
			{{ Form::label('password_again', 'Your prefered password (again)') . Form::password('password_again', array('class' => 'form-control', 'placeholder' => 'Password again')) }}
		</div>
	</fieldset>
	<fieldset>
		{{ Form::submit('Create!', array('class' => 'btn btn-default')) }}
	</fieldset>
	{{ Form::close() }}
@stop