@extends('bitaac::app')

{{-- Page breadcrumbs. --}}
@section('breadcrumbs')
    <li>Community
    <li><a href="{{ url('/guilds') }}">Guilds</a>
    <li><a href="{{ $guild->link() }}">{{ $guild->name }}</a>
    <li>Invite
@stop

{{-- Page content. --}}
@include('bitaac::partials.heading', ['title' => 'Guilds', 'desc' => ''])

@section('content')
	<p>Enter the name of a character you want to invite to your guild and click on "Submit".</p>

	<form method="POST">
		{!! csrf_field() !!}

		<table>
			<tr class="header">
				<th colspan="2">Invite Character</th>
			</tr>

			{{-- Character field. --}}
			<tr>
				<th width="20%">Character:</th>
				<td>
					<input type="text" name="character">

					@if ($errors->has('character'))
						<em class="error">{{ $errors->first('character') }}</em>
					@endif
				</td>
			</tr>

			{{-- Submit & back buttons. --}}
			<tr class="transparent noborderpadding">
				<th></th>
				<td>
					<input type="submit" value="Submit" class="button">
					<a href="{{ $guild->link() }}" class="button">Back</a>
				</td>
			</tr>
		</table>

	</form>
@endsection
