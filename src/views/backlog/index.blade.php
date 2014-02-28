@extends('thepanel::layouts.master')

@section('title')
	The Panel Backlog
@stop

@section('content')

<p class="add-to-backlog"><a href="/thepanel/add">+ @lang('thepanel.addlink')</a></p>
<!-- 	<p class="sort-backlog">
		<em>@lang('thepanel.sortby'):</em>
		@if(Request::is('backlog/list/votes'))
			{{ trans('thepanel.votes') }} | <a href="/backlog/list">{{ trans('thepanel.incoming') }}</a>
		@else
			<a href="/backlog/list/votes">{{ trans('thepanel.votes') }}</a> | {{ trans('thepanel.incoming') }}
		@endif

	</p> -->
	@if($items)
	<table class="table table-striped backlog">
		<thead>
			<tr>
				<td class="links">
					<strong>Link</strong>
				</td>
				<td colspan="2">
					<strong>Votes</strong>
				</td>
			</tr>
		</thead>
		<tbody>

				@foreach ($items as $link)
					<tr data-votes="{{ $link->vote_count }}">
						<td class="link-cell">
							<a href="{{ $link->url }}">{{ $link->title }}</a><br /><small>{{ $link->domain }} | <span title="Added by {{ $link->user->name }}" class="link-date">{{ $link->date_ago }}</span></small>
							@if(!empty($link->reason))
							<p class="reason"><em>{{ $link->reason }}</em></p>
							@endif
						</td>
						<td>
							<div class="votes">
								@if (!$link->votes->isEmpty())
					                @foreach ($link->votes as $vote)
					                	<img src="http://www.gravatar.com/avatar/{{{ md5(strtolower(trim($vote->user->email))) }}}?s=32&d=identicon" title="{{{ $vote->user->name }}}" class="img-circle">
					                @endforeach
					            @endif
							</div>
						</td>
						<td class="vote-cell">
							{{ Form::open(array('url' => '/backlog/vote')) }}
							<input type="hidden" name="link_id" value="{{ $link->id }}">
							@if ($link->user_has_already_voted == TRUE)
								<!-- <button type="submit" class="btn btn-default" disabled="disabled">Voted</button> -->
							@else
								<button type="submit" class="btn btn-success">+1</button>
							@endif
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach

		</tbody>
	</table>
	@else
		<p>No links yet</p>
	@endif
@stop
