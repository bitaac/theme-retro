@extends('bitaac::app')

{{-- Page breadcrumbs. --}}
@section('breadcrumbs')
    <li>Community
    <li><a href="{{ url('/guilds') }}">Guilds</a>
    <li>Create Guild
@stop

{{-- Page content. --}}
@include('bitaac::partials.heading', ['title' => 'Guilds', 'desc' => ''])

@section('content')
    <form method="POST">
        {!! csrf_field() !!}

        <table>
            <tr class="header">
                <th colspan="2">Create Guild</th>
            </tr>

            {{-- Name field. --}}
            <tr>
                <th width="20%">Name:</th>
                <td>
                    <input type="text" name="name">

                    @if ($errors->has('name'))
                        <em class="error">{{ $errors->first('name') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Leader field. --}}
            <tr>
                <th>Leader:</th>
                <td>
                    <select name="leader">
                        @foreach($account->characters as $character)
                            <option value="{{ $character->id }}">
                                {{ $character->name }}
                            </option>
                        @endforeach
                    </select>

                    @if ($errors->has('leader'))
                        <em class="error">{{ $errors->first('leader') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Submit & back buttons. --}}
            <tr class="transparent">
                <th></th>
                <td>
                    <input type="submit" value="Submit" class="button">
                    <a href="{{ url('/guilds') }}" class="button">Back</a>
                </td>
            </tr>
        </table>
    </form>
@endsection
