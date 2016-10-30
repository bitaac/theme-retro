@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li><a href="{{ url('/forum') }}">Forum</a>
    	<li><a href="{{ $board->link() }}">{{ $board->title }}</a>
    	<li>
            @if ($thread->locked)
    			<img src="{{ asset('bitaac/retro-theme/images/lock.png') }}" style="vertical-align: top;" title="locked">
    		@endif

    		@if ($thread->sticked)
    			<img src="{{ asset('bitaac/retro-theme/images/pin.png') }}" style="vertical-align: top;" title="sticked">
    		@endif
            <a href="{{ $thread->link() }}">{{ $thread->title }}</a>
        </li>
    	<li>Unlock
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
    			<td colspan="2">Are you sure you want to unlock thread <strong>{{ $thread->title }}</strong> by <a href="#">{{ $thread->player->name }}</a>?</td>
    		</tr>
    		<tr class="transparent noborderpadding">
    			<th width="20%"></th>
    			<td>
    				<input type="submit" class="button">
    				<a href="{{ $thread->link() }}" class="button">Back</a>
    			</td>
    		</tr>
    	</table>
    </form>
@stop
