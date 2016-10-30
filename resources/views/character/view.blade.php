@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li>Community
    	<li><a href="{{ url('/character') }}">Character</a>
    	<li>{{ $player->name }}
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Characters', 'desc' => 'Detailed information about a certain player.'])

    <p></p>

    <table>
    	<tr class="header">
    		<th colspan="2">Character Information</th>
    	</tr>

    	{{-- Name field. --}}
    	<tr>
    		<th width="22%">Name:</th>
    		<td>{{ $player->name }}</td>
    	</tr>

    	{{-- Gender field. --}}
    	<tr>
    		<th>Gender</th>
    		<td>{{ gender($player->sex) }}</td>
    	</tr>

    	{{-- Vocation field. --}}
    	<tr>
    		<th>Profession:</th>
    		<td>{{ vocation($player->vocation) }}</td>
    	</tr>

    	{{-- Level field. --}}
    	<tr>
    		<th>Level:</th>
    		<td>{{ $player->level }}</td>
    	</tr>

    	{{-- Town field. --}}
    	<tr>
    		<th>Residence:</th>
    		<td>{{ town($player->town_id) }}</td>
    	</tr>

    	{{-- Guild field. --}}
    	@if ($player->guild)
    		<tr>
    			<th>Guild:</th>
    			<td>
                    He is {{ $player->guild->rank->name }} of 
                    <a href="{{ $player->guild->link() }}">{{ $player->guild->name() }}</a>
    			</td>
    		</tr>
    	@endif

    	{{-- Last login field. --}}
    	<tr>
    		<th>Last Login:</th>
    		<td>
    			@if ($player->lastlogin)
    				{{ date('M d Y, H:i:s T', $player->lastlogin) }}
    			@else
    				Never logged in.
    			@endif
    		</td>
    	</tr>

    	{{-- Comment field. --}}
    	@if ( ! empty($player->bit->comment))
    		<tr>
    			<th valign="top">Comment:</th>
    			<td>{{ nl2br(e(lines($player->bit->comment, 10))) }}</td>
    		</tr>
    	@endif

    	{{-- Account status field. --}}
    	<tr>
    		<th>Account Status:</th>
    		<td>
    			@if ($player->account->premium)
    				<span class="online">Premium Account</span>
    			@else
    				Free Account
    			@endif
    		</td>
    	</tr>
    </table>

    {{-- Deaths. --}}
    @if ($deaths->count())
    	<br>

    	<table>
    		<tr class="header">
    			<th colspan="2">Deaths</th>
    		</tr>

    		@foreach ($deaths as $death)
    			<tr>
    				<td width="22%">{{ date('M d Y, H:i:s T', (int) $death->time) }}</td>
    				<td>
                        {{
                            str_e('Killed at level :level by :killed_by and :mostdamage_by.', [
                                'level'         => $death->level,
                                'killed_by'     => $death->killed_by,
                                'mostdamage_by' => $death->mostdamage_by
                            ])
                        }}
    				</td>
    			</tr>
    		@endforeach
    	</table>
    @endif

    {{-- Account Information. --}}
    @if ( ! $player->isHidden())
    	@if ($player->account->birthday())
    		<br>

    		<table>
    			<tr class="header">
    				<th colspan="2">Account Information</th>
    			</tr>
    			<tr>
    				<th width="22%">Created</th>
    				<td>{{{ date('M d Y, H:i:s T', $player->account->birthday()) }}}</td>
    			</tr>
    		</table>
    	@endif

    	<br>

        {{-- Charaters. --}}
    	<table>
    		<tr class="header">
    			<th colspan="4">Characters</th>
    		</tr>
    		<tr>
    			<th width="70%">Name</th>
    			<th>Level</th>
    			<th>Vocation</th>
    			<th>Status</th>
    		</tr>
    		@foreach ($player->account->characters as $key => $character)
    			<tr>
    				{{-- Name field. --}}
    				<td>
    					{{ ++$key }}.
    					@if ($player->id === $character->id)
    						{{ $character->name }}
    						<em style="font-size: 90%; opacity: .5;">(currently viewing)</em>
    					@else
    						<a href="{{ $character->link() }}">{{{ $character->name }}}</a>
    					@endif
    				</td>

    				{{-- Level field. --}}
    				<td>{{ $character->level }}</td>

    				{{-- Vocation field. --}}
    				<td>{{ vocation($character->vocation) }}</td>

    				{{-- Status field. --}}
    				<td>
    					@if ($character->isOnline())
    						<span class="online">online</span>
    					@else
    						offline
    					@endif
    				</td>
    			</tr>
    		@endforeach
    	</table>
    @endif

    <br>

    {{-- Character search. --}}
    <form method="POST" action="{{ url('/character') }}">
        {!! csrf_field() !!}

    	<table>
    		<tr class="header">
    			<th colspan="2">Search Character</th>
    		</tr>

    		{{-- Character field. --}}
    		<tr>
    			<th width="22%">Character:</th>
    			<td>
                    <input type="text" name="name">

                    @if ($errors->has('name'))
                        <em class="error">{{ $errors->first('name') }}</em>
                    @endif
                </td>
    		</tr>

    		{{-- Submit button. --}}
    		<tr class="transparent">
    			<th></th>
    			<td><input type="submit" class="button" value="submit"></td>
    		</tr>
    	</table>

    </form>
@endsection
