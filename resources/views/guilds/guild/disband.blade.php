@extends('bitaac::app')

{{-- Page breadcrumbs. --}}
@section('breadcrumbs')
    <li>Community
    <li><a href="{{ url('/guilds') }}">Guilds</a>
    <li><a href="{{ $guild->link() }}">{{ $guild->name }}</a>
    <li>Invite
@stop

{{-- Page content. --}}
@include('bitaac::partials.heading', ['title' => 'Guilds', 'desc' => 'Information abouts guild on {server}.'])

@section('content')

    <p>Do you really want to disband your guild? Confirm this decision with your password and click on "Submit".</p>

    <form method="POST">
        {!! csrf_field() !!}

        <table>
            <tr class="header">
                <th colspan="2">Disband Guild</th>
            </tr>

            {{-- Password field. --}}
            <tr>
                <th width="20%">Password:</th>
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
                    <a href="{{ $guild->link() }}" class="button">Back</a>
                </td>
            </tr>
        </table>

    </form>
@endsection
