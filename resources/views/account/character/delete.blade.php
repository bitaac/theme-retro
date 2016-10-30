@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li><a href="{{ url('/account') }}">Account</a>
    	<li>Delete Character
    @stop


    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Account', 'desc' => 'View and edit your account.'])

    <p>To delete a character enter the name of the character and your password.</p>

    <form method="POST">
        {{ csrf_field() }}

    	<table>
    		<tr class="header">
    			<th colspan="2">Delete Character</th>
    		</tr>

    		{{-- Name field. --}}
    		<tr>
    			<th width="20%"><label>Name:</label></th>
    			<td>
    				<input type="text" name="character">

    				@if ($errors->has('character'))
    					<em class="error">{{ $errors->first('character') }}</em>
    				@endif
    			</td>
    		</tr>

    		{{-- Password field. --}}
    		<tr>
    			<th><label>Password</label></th>
    			<td>
    				<input type="password" name="password">

    				@if ($errors->has('password'))
    					<em class="error">{{ $errors->first('password') }}</em>
    				@endif
    			</td>
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
