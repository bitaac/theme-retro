@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li><a href="{{ url('/account') }}">Account</a>
        <li>Two-Factor Authentication
    @stop

    {{-- Page contents. --}}
    @include('bitaac::partials.heading', ['title' => 'Account', 'desc' => 'View and edit your account.'])

    <form method="POST">
        {!! csrf_field() !!}

        <table>
            <tr class="header">
                <th colspan="4" align="center">Two-Factor Authentication</th>
            </tr>

            <tr>
                <td align="center"> 
                    <div class="visible-print text-center">
                        <?php
                            $secret = ($account->secret) ? $account->secret : Google2FA::generateSecretKey();

                            $google2fa_url = Google2FA::getQRCodeGoogleUrl(
                                'bitaac',
                                $account->name,
                                $account->bitaac->secret
                            );
                        ?>

                        <img src="{{ $google2fa_url }}">

                        <div>
                            <li>Scan the QR code above with <b>Google Authenticator</b> or <b>Authy</b>.</li>
                            <li>Write the generated token into the field below and press enable/disable.</li>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td align="center">
                    Token: <input type="text" name="secret"> 
                    @if ($errors->has('secret'))
                        <em class="error">{{ $errors->first('secret') }}</em>
                    @endif
                </td>
            </tr>
        </table>

        {{-- Create & delete character buttons. --}}
        <table>
            <tr class="transparent noborderpadding">
                <td align="center">
                    @if ($account->secret) 
                        <input type="submit" value="Disable" class="button">
                    @else
                        <input type="submit" value="Enable" class="button">
                    @endif
                    <a href="{{ url('/account') }}" class="button">Back</a>
                </td>
            </tr>
        </table>
    </form>
@stop
