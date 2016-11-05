@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li>Account
    @stop

    {{-- Page contents. --}}
    @include('bitaac::partials.heading', ['title' => 'Account', 'desc' => 'View and edit your account.'])

    @if ($account->hasPendingEmail())
        <div class="alert">
            <p>A request has been submitted to change the email address of this account to {{ $account->getPendingEmail() }}. <br> The actual change will take place after {{ $account->getPendingEmailTime() }}. <br> Please cancel the request if you do not want your email address to be changed! <a href="#">Click here to cancel</a></p>
        </div>
    @endif

    <table>
        <tr class="header">
            <th colspan="2">General Information</th>
        </tr>

        {{-- Account name/id. --}}
        <tr>
            <th width="20%">Account:</th>
            <td>{{ $account->name }}</td>
        </tr>

        {{-- Account email. --}}
        <tr>
            <th>Email:</th>
            <td>{{ $account->email }}</td>
        </tr>

        {{-- Account creation. --}}
        <tr>
            <th>Created:</th>
            <td>{{ $account->bit->created_at }}</td>
        </tr>

        {{-- Account last login. --}}
        <tr>
            <th>Last Login:</th>
            <td>{{ $account->bit->last_login }}</td>
        </tr>

        {{-- Account status. --}}
        <tr>
            <th>Account Status:</th>
            <td>
                @if ($days = $account->premium)
                    <span class="online">Premium account</span>
                @else
                    Free Account
                @endif
            </td>
        </tr>

        {{-- 2FA status. --}}
        @if (config('account.two-factor'))
            <tr>
                <th>Two-Factor Authentication:</th>
                <td>
                    @if ($account->secret)
                        <span class="online">Enabled</span>
                    @else
                        <span class="offline">Disabled</span>
                    @endif
                </td>
            </tr>
        @endif
    </table>

    <table>
        {{-- Header buttons. --}}
        <tr class="transparent noborderpadding">
            <td width="100%">
                <a href="{{ url('/account/email') }}" class="button">Change Email</a>
                <a href="{{ url('/account/password') }}" class="button">Change Password</a>
                @if (config('account.two-factor'))
                    <a href="{{ url('/account/authentication') }}" class="button">Two-Factor Authentication</a>
                @endif
            </td>
            <td>
                <a href="{{ url('/account/logout') }}" class="button">Log Out</a>
            </td>
        </tr>
    </table>

    <br>

    {{-- Account characters. --}}
    <table>
        <tr class="header">
            <th colspan="4">Characters</th>
        </tr>
        <tr>
            <th width="70%">Name</th>
            <th>Gender</th>
            <th>Status</th>
            {{-- <th></th> --}}
        </tr>

        @forelse($account->characters as $i => $character)
            <tr>
                <td>
                    {{ ++$i }}.
                    <a href="{{ url('/character/'.str_slug($character->name)) }}">{{ $character->name }}</a>
                    <em class="desc">(Level {{ $character->level . ' ' . vocation($character->vocation) }})</em>
                    @if ($character->hasPendingDeletion())
                        <font color="red">DELETED</font>
                        <a href="{{ url_e('/account/undelete/:name', ['name' => $character->name]) }}">
                            (cancel)
                        </a>
                    @endif
                </td>
                <td>{{ gender($character->sex) }}</td>
                @if ($character->isOnline())
                    <td><div class="online">online</div></td>
                @else
                    <td>offline</td>
                @endif
                {{-- <td><a href="#">[edit]</a></td> --}}
            </tr>
        @empty
            <tr>
                <td colspan="4">You do not have any characters as of right now, why don't you go ahead and create one?</td>
            </tr>
        @endforelse
    </table>

    {{-- Create & delete character buttons. --}}
    <table>
        <tr class="transparent noborderpadding">
            <td>
                <a href="{{ url('/account/character') }}" class="button">Create Character</a>
                <a href="{{ url('/account/character/delete') }}" class="button">Delete Character</a>
            </td>
        </tr>
    </table>
@stop
