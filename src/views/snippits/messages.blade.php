@if( $success->all() )
    @foreach ($success->all() as $msg)
		<div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ $msg }}
        </div>
    @endforeach
@endif

@if( $errors->all() )
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ $error }}
        </div>
	@endforeach
@endif