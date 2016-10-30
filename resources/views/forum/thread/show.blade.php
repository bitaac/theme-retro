@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li><a href="{{ url('/forum') }}">Forum</a>
    	<li><a href="{{ url_e('/forum/:board', ['board' => $board->title]) }}">{{ $board->title }}</a>
    	<li>
    		@if ($thread->locked)
    			<img src="{{ asset('bitaac/retro-theme/images/lock.png') }}" style="vertical-align: top;" title="locked">
    		@endif

    		@if ($thread->sticked)
    			<img src="{{ asset('bitaac/retro-theme/images/pin.png') }}" style="vertical-align: top;" title="sticked">
    		@endif

    		{{ $thread->title }}
    	</li>
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Forum', 'desc' => ''])

    {{-- Reply button & pagination. --}}
    <table>
    	<tr class="transparent noborderpadding">
    		<td>
    			@if (auth()->check() && (! $thread->locked or $account->isAdmin()))
    				<a href="{{ URL::current() }}/reply" class="button">Reply</a>
    			@endif

    			@if (auth()->check() && $account->isAdmin())
    				@if ($thread->locked)
    					<a href="{{ URL::current() }}/unlock" class="button">Unlock</a>
    				@else
    					<a href="{{ URL::current() }}/lock" class="button">Lock</a>
    				@endif
    			@endif

    			@if (auth()->check() && $account->isAdmin())
    				<a href="{{ URL::current() }}/delete" class="button">Delete</a>
    			@endif
    		</td>
    		<td align="right">
                @if ($previous = $posts->previousPageUrl())
					<a href="{{ url($previous) }}">Previous</a>
				@endif

				@if ($next = $posts->nextPageUrl())
					<a href="{{ url($next) }}">Next</a>
				@endif
            </td>
    	</tr>
    </table>

    {{-- Author & title fields. --}}
    <table class="forum-posts">
    	<tr class="header">
    		<th>Author</th>
    		<th>{{ $thread->title }}</th>
    	</tr>

    	{{-- Original post. --}}
    	@if ($posts->currentPage() === 1)
    		@include('bitaac::forum.thread.post', ['oddeven' => 'even', 'post' => $thread, 'i' => 1])
    	@endif

    	{{-- Responses. --}}
    	@foreach ($posts as $i => $post)
    		@include('bitaac::forum.thread.post', ['oddeven' => ($i % 2 === 0 ? 'odd' : 'even'), 'post' => $post, 'i' => ($offset + $i) + 2])
    	@endforeach

    	<tr class="header">
    		<th colspan="2"><small>All times are {{ date('T') }}</small></th>
    	</tr>
    </table>
@stop
