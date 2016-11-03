@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li>Account
        <li>Log In
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Account', 'desc' => 'View and edit your account.'])

    <p>Please enter your account credentials below.<br>If you do not have an account yet, simply <a href="{{ url('/register') }}">sign up</a> up to get one.</p>

    <form method="POST">
        {!! csrf_field() !!}

        <table>
            <tr class="header">
                <th colspan="2">Account Log In</th>
            </tr>

            {{-- Account field. --}}
            <tr>
                <th width="20%">Account:</th>
                <td>
                    <input type="password" name="account">

                    @if ($errors->has('account'))
                        <em class="error">{{ $errors->first('account') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Password field. --}}
            <tr>
                <th>Password:</th>
                <td>
                    <input type="password" name="password">

                    @if ($errors->has('password'))
                        <em class="error">{{ $errors->first('password') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Two-Factor authentication field. --}}
            @if (config('account.two-factor'))
                <tr>
                    <th>2FA Code:</th>
                    <td>
                        <input type="text" name="2fa">
                    </td>
                </tr>
            @endif

            {{-- Submit button. --}}
            <tr class="transparent noborderpadding">
                <th></th>
                <td><input type="submit" value="Log In" class="button"></td>
            </tr>
        </table>

    </form>
@stop