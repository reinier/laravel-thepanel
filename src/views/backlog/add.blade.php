@extends('thepanel::layouts.master')

@section('title')
	The Panel add link
@stop

@section('content')
	{{ Form::open(array('url' => '/thepanel/add')) }}
	<fieldset>
		<div class="form-group">
			{{ Form::label('title', 'Link title') . Form::text('title', Input::old('title'), array('class' => 'form-control', 'placeholder' => 'link title')) }}
		</div>
		<div class="form-group">
			{{ Form::label('url', 'Link url') . Form::text('url', Input::old('url'), array('class' => 'form-control', 'placeholder' => 'link url')) }}
		</div>
	</fieldset>

	<fieldset>
		{{ Form::submit('Add', array('class' => 'btn btn-default')) }}
	</fieldset>
	{{ Form::close() }}
@stop
