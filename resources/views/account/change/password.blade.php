@extends('bitaac::app')


@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li><a href="{{ url('/account') }}">Account</a>
        <li>Change Password
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Account', 'desc' => 'View and edit your account.'])

    <p>Please enter your current password and a new password. For your security, please enter the new password twice.</p>

    <form method="POST">
        {{ csrf_field() }}

        <table>
            <tr class="header">
                <th colspan="2">Change Password</th>
            </tr>

            {{-- Password field. --}}
            <tr>
                <th width="20%"><label>Password:</label></th>
                <td>
                    <input type="password" name="password">

                    @if ($errors->has('password'))
                        <em class="error">{{ $errors->first('password') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Repeat password field. --}}
            <tr>
                <th><label>Repeat Password:</label></th>
                <td>
                    <input type="password" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <em class="error">{{ $errors->first('password_confirmation') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Current password field. --}}
            <tr>
                <th><label>Current Password:</label></th>
                <td>
                    <input type="password" name="current">

                    @if ($errors->has('current'))
                        <em class="error">{{ $errors->first('current') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Submit & back buttons. --}}
            <tr class="transparent noborderpadding">
                <th></th>
                <td>
                    <input type="submit" class="button" value="Submit">
                    <a class="button" href="{{ url('account') }}">Back</a>
                </td>
            </tr>
        </table>
        
    </form>
@endsection
