@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li><a href="{{ url('/guilds') }}">Guilds</a>
        <li><a href="{{ $guild->link() }}">{{ $guild->name }}</a>
        <li>Join
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Guilds', 'desc' => 'Information abouts guild.'])

    <p>The following of your characters have been invited to this guild. If you want to join, select a character and click on "Submit".</p>

    <form method="POST">
        {!! csrf_field() !!}

        <table>
            <tr class="header">
                <th colspan="2">Join Guild</th>
            </tr>

            {{-- Character field. --}}
            <tr>
                <th width="20%" valign="top">Character:</th>
                <td>
                    <table>
                        <tr class="transparent nopadding">
                            <td>
                                @foreach ($account->getGuildCharactersExpectOwner($guild) as $invite)
                                    <input type="radio" name="character" value="{{ $invite->player_id }}"> {{ $invite->player->name }}<br>
                                    <br>
                                @endforeach
                            </td>
                            <td valign="middle">
                                @if ($errors->has('character'))
                                    <em class="error">{{ $errors->first('character') }}</em>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            {{-- Submit & back buttons. --}}
            <tr class="transparent noborderpadding">
                <th></th>
                <td>
                    <input type="Submit" class="button">
                    <a href="{{ $guild->link() }}" class="button">Back</a>
                </td>
            </tr>
        </table>

    </form>
@stop