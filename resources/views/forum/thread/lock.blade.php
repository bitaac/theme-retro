@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li><a href="{{ url('/forum') }}">Forum</a>
    	<li><a href="{{ url_e('/forum/:board', ['board' => $board->title]) }}">{{ $board->title }}</a>
    	<li><a href="{{ url_e('/forum/:board/:thread', ['board' => $board->title, 'thread' => $thread->title]) }}">{{ $thread->title }}</a>
    	<li>Lock Thread
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Forum', 'desc' => ''])

    <form method="POST">
        {!! csrf_field() !!}

        <table>
    		<tr class="header">
    			<th colspan="2">{{ $thread->title }}</th>
    		</tr>
    		<tr>
    			<td colspan="2">
                    Are you sure you want to lock thread <strong>{{ $thread->title }}</strong> by {{ $thread->player->name }}?
                </td>
    		</tr>
    		<tr class="transparent noborderpadding">
    			<th width="20%"></th>
    			<td>
    				<input type="submit" class="button">
    				<a href="{{ url_e('/forum/:board/:thread', ['board' => $board->title, 'thread' => $thread->title]) }}" class="button">
                        Back
                    </a>
    			</td>
    		</tr>
    	</table>
    </form>
@stop
