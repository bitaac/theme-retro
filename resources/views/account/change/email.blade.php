@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li><a href="{{ url('/account') }}">Account</a>
        <li>Change Email
    @stop


    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Account', 'desc' => 'View and edit your account.'])

    <p>Please enter your password and the new email address. Make sure that you enter a valid email address which you have access to.</p>

    <form method="POST">
        {{ csrf_field() }}

        <table>
            <tr class="header">
                <th colspan="2">Change Email</th>
            </tr>

            {{-- Email field. --}}
            <tr>
                <th width="20%"><label>Email Address:</label></th>
                <td>
                    <input type="text" value="{{ $account->email }}" name="email">

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

            {{-- Submit & back buttons. --}}
            <tr class="transparent noborderpadding">
                <th></th>
                <td>
                    <input type="submit" class="button" value="Submit">
                    <a href="{{ url('account') }}" class="button">Back</a>
                </td>
            </tr>
        </table>

    </form>
@endsection