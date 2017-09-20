@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li>Account
        <li>Create
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Sign Up', 'desc' => 'Create your account in order to log in.'])

    <p>If you already have an account, you might want to <a href="{{ url('/login') }}">log in</a> instead.</p>

    <form method="POST">
        {!! csrf_field() !!}

        <table>
            <tr class="header">
                <th colspan="2">Create Account</th>
            </tr>

            {{-- Account field --}}
            <tr>
                <th width="20%"><label>Account:</label></th>
                <td>
                    <input type="text" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <em class="error">{{ $errors->first('name') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Email field. --}}
            <tr>
                <th><label>Email:</label></th>
                <td>
                    <input type="text" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <em class="error">{{ $errors->first('email') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Password field. --}}
            <tr>
                <th><label>Password:</label></th>
                <td>
                    <input type="password" name="password">

                    @if ($errors->has('password'))
                        <em class="error">{{ $errors->first('password') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Repeat Password field. --}}
            <tr>
                <th><label>Repeat:</label></th>
                <td><input type="password" name="password_confirmation"></td>
            </tr>

            {{-- Terms of Service & server rules. --}}
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">I agree with the <a href="#">Terms of Service</a> & <a href="#">Server Rules</a>.</label>
                </td>
            </tr>

            {{-- Submit & back buttons. --}}
            <tr class="transparent noborderpadding">
                <th></th>
                <td>
                    <input type="submit" class="button" value="Create Account">
                    <a href="{{ url('account') }}" class="button">Back</a>
                </td>
            </tr>
        </table>

    </form>
@stop
