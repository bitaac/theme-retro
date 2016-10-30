@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
	@section('breadcrumbs')
		<li><a href="{{ url('/forum') }}">Forum</a>
		<li><a href="{{ $board->link() }}">{{ $board->title }}</a>
		<li><a href="{{ $thread->link() }}">{{ $thread->title }}</a>
		<li>Delete
	@stop

	{{-- Page content. --}}
	@include('bitaac::partials.heading', ['title' => 'Forum', 'desc' => ''])

	<form method="POST">
		{!! csrf_field() !!}

		<table>
			<tr class="header">
				<th colspan="2">Delete Thread</th>
			</tr>
			<tr>
				<td colspan="2">Are you sure you want to delete thread <strong>{{ $thread->title }}</strong> by <a href="{{ $thread->player->link() }}">{{ $thread->player->name }}</a> ?</td>
			</tr>
			<tr class="transparent noborderpadding">
				<th width="20%"></th>
				<td>
					<input type="submit" class="button" value="Submit">
					<a href="{{ $thread->link() }}" class="button">Back</a>
				</td>
			</tr>
		</table>
	</form>
@endsection