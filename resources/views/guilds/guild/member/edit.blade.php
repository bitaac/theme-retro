@extends('bitaac::app')

{{-- Page breadcrumbs. --}}
@section('breadcrumbs')
    <li>Community
    <li><a href="{{ url('/guilds') }}">Guilds</a>
    <li><a href="{{ $guild->link() }}">{{ $guild->name }}</a>
    <li>Edit Ranks
@stop

@section('content')
    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Guilds', 'desc' => 'Information abouts guild on {server}.'])

    <p>Select a member and the action you want to perform, then click on "Submit".</p>

    <form method="POST">
        {{ csrf_field() }}

        <table>
            <tr class="header">
                <th colspan="4">Edit Members</th>
            </tr>
            <tr>
                {{-- Name field. --}}
                <th valign="top" width="10%">Name:</th>
                <td valign="top" width="30%">
                    <select name="member">
                        @foreach ($guild->getMembersExceptOwner as $member)
                            <option value="{{ $member->player_id }}">{{ $member->player->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('member'))
                        <p><em class="error up">{{ $errors->first('member') }}</em></p>
                    @endif
                </td>

                {{-- Action field. --}}
                <th valign="top" width="10%">Action:</th>
                <td>
                    <label>
                        <input type="radio" name="action" id="action_rank">
                        Set rank to
                    </label> 
                    <select name="rank">
                        @foreach ($guild->getRanks as $rank)
                            <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                        @endforeach
                    </select>    


                    @if ($errors->has('action'))
                        <p><em class="error up">{{ $errors->first('action') }}</em></p>
                    @elseif ($errors->has('rank'))
                        <p><em class="error up">{{ $errors->first('rank') }}</em></p>
                    @endif
                </td>
            </tr>
        </table>

        {{-- Submit & back buttons. --}}
        <table>
            <tr class="transparent noborderpadding">
                <th width="20%"></th>
                <td>
                    <input type="submit" value="Submit" class="button">
                    <a href="{{ $guild->link() }}" class="button">Back</a>
                </td>
            </tr>
        </table>
        
    </form>
@stop