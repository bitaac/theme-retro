@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li><a href="{{ url('/account') }}">Account</a>
    	<li>Undelete Character
        <li>{{ $player->name }}
    @stop


    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Account', 'desc' => 'Undelete a character.'])

    <form method="POST">
        {{ csrf_field() }}

    	<table>
    		<tr class="header">
    			<th colspan="2">Delete Character</th>
    		</tr>

    		{{-- Confirmation message. --}}
    		<tr>
    			<td colspan="2">Are you sure you want to undelete character <b>{{ $player->name }}</b>?</td>
    		</tr>

    		{{-- Submit & back buttons. --}}
    		<tr class="transparent noborderpadding">
    			<th></th>
    			<td>
                    <input type="submit" class="button" value="Submit">
    				<a class="button" href="{{ url('/account') }}">Back</a>
    			</td>
    		</tr>
    	</table>

    </form>
@endsection
