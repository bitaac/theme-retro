@extends('bitaac::app')

@section('content')
    @section('breadcrumbs')
    	<li><a href="{{ url('/forum') }}">Forum</a>
    	<li>{{ $board->title }}
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Forum', 'desc' => ''])

    @if ($board->description)
    	<p>{{ $board->description }}</p>
    @endif

    <table>
    	{{-- Create thread button & pagination. --}}
    	<tr class="transparent noborderpadding">
    		<td>
    			@if (auth()->check() && (! $board->news or auth()->user()->isAdmin()))
    				<a href="{{ route('forum.thread.create', $board) }}" class="button">Create Thread</a>
    			@endif
    		</td>
    		<td colspan="3" align="right">
				@if ($previous = $threads->previousPageUrl())
					<a href="{{ url($previous) }}">Previous</a>
				@endif

				@if ($next = $threads->nextPageUrl())
					<a href="{{ url($next) }}">Next</a>
				@endif
            </td>
    	</tr>

    	<tr class="header">
    		<th width="54%">Thread</th>
    		<th width="8%">Replies</th>
    		<th width="8%">Views</th>
    		<th>Latest Post</th>
    	</tr>

    	{{-- Threads. --}}
    	@forelse ($threads as $thread)
    		<tr>
    			{{-- Title & description fields. --}}
    			<td>
    				@if ($thread->locked)
    					<img src="{{ asset('bitaac/retro-theme/images/lock.png') }}" style="vertical-align: top;" title="locked">
    				@endif

    				{{-- @if ($thread->isSticked())
    					<img src="{{ asset('packages/pandaac/theme-retro/img/pin.png') }}" style="vertical-align: top;" title="sticked">
    				@endif --}}

    				<a href="{{ $thread->link() }}">{{ $thread->title }}</a>

    				{{-- @if ($total = Config::get('pandaac::forum.posts-per-page') and $ceil = ceil(($thread->posts->count() + 1) / $total) and $ceil > 1)
    					<small>
    						{{ trans('pandaac::forum.board.field.pages', ['pages' => trim(View::make('theme::forum.pagination', [
    							'url'		 => slug('forum', $board->title, $thread->id),
    							'plain'		 => true,
    							'current'	 => ceil($ceil / 2),
    							'total'		 => $ceil,
    						]))]) }}
    					</small>
    				@endif --}}

    				<br>

    				<small>
    					by
    					<a href="{{ $thread->player->link() }}">{{ $thread->player->name }}</a>,
    					<abbr title="{{ date('M d Y, H:i:s T', strtotime($thread->thread_created_at)) }}">
                            {{ ago(strtotime($thread->created_at)) }}
                        </abbr>
    				</small>
    			</td>

    			{{-- Total replies field. --}}
    			<td>{{ $thread->replies->count() }}</td>

    			{{-- Total views field. --}}
    			<td>{{ $thread->views }}</td>

    			{{-- Latest post field. --}}
    			<td>
    				@if ($latest = $thread->replies->last())
    					<small>
    						by
    						<a href="{{ $thread->hotlink($latest) }}">
                                <img src="{{ asset('bitaac/retro-theme/images/forum-latest.png') }}" class="forum-post-latest" width="8" height="8">
                            </a>

    						<a href="{{ $latest->player->link() }}">{{ $latest->player->name }}</a>,

    						<abbr title="{{ date('M d Y, H:i:s T', strtotime($latest->created_at)) }}">
                                {{ ago(strtotime($latest->created_at)) }}
                            </abbr>
    					</small>
    				@else
                        -
                    @endif
    			</td>
    		</tr>
    	@empty
    		<tr>
    			<td colspan="4">There are no threads as of right now. Why don't you create one?</td>
    		</tr>
    	@endforelse

    	<tr class="header">
    		<th colspan="4"><small>All times are {{ date('T') }}.</small></th>
    	</tr>

    	{{-- Create thread button & pagination. --}}
    	<tr class="transparent noborderpadding">
    		<td>
    			@if (auth()->check() && (! $board->news or auth()->user()->admin))
    				<a href="{{ route('forum.thread.create', $board) }}" class="button">Create Thread</a><br><br>
    			@endif
    		</td>
    		<td colspan="3" align="right"></td>
    	</tr>
    </table>
@stop
