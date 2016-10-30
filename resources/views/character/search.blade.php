@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li>Community
        <li>Search Character
    @stop


    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Characters', 'desc' => 'Detailed information about a certain player.'])


    <form method="POST">
        {!! csrf_field() !!}

        <table>
            <tr class="header">
                <th colspan="2">Search Character</th>
            </tr>

            {{-- Character field. --}}
            <tr>
                <th width="20%">Character:</th>
                <td>
                    <input type="text" name="name">

                    @if ($errors->has('name'))
                        <em class="error">{{ $errors->first('name') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Submit button. --}}
            <tr class="transparent">
                <th></th>
                <td><input type="submit" class="button" value="Submit"></td>
            </tr>
        </table>

    </form>
@endsection
