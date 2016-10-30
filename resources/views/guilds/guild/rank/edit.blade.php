@extends('bitaac::app')

{{-- Page breadcrumbs. --}}
@section('breadcrumbs')
    <li>Community
    <li><a href="{{ url('/guilds') }}">Guilds</a>
    <li><a href="{{ $guild->link() }}">{{ $guild->name }}</a>
    <li>Edit Ranks
@stop

{{-- Page content. --}}
@include('bitaac::partials.heading', ['title' => 'Guilds', 'desc' => 'Information abouts guild on {server}.'])

@section('content')

    <p>If you want to change the number of ranks in your guild or their names, edit the corresponding field and click on "Submit".</p>

    <form method="POST">
        {{ csrf_field() }}

        <table>
            <tr class="header">
                <th colspan="2">Edit Ranks</th>
            </tr>

            {{-- Name field. --}}
            <tr>
                <td colspan="2">
                    Set rank name

                    <select name="rank">
                        @foreach ($guild->getRanks as $rank)
                            <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                        @endforeach
                    </select>
                    
                    to:

                    <input type="text" name="name" value="{{ old('name') }}">

                    @if ($errors->has('rank'))
                        <em class="error">{{ $errors->first('rank') }}</em>
                    @elseif ($errors->has('name'))
                        <em class="error">{{ $errors->first('name') }}</em>
                    @endif
                </td>
            </tr>

            {{-- Submit & back buttons. --}}
            <tr class="transparent noborderpadding">
                <th width="20%"></th>
                <td>
                    <input type="submit" value="Submit" class="button">
                    <a href="{{ $guild->link() }}" class="button">Back</a>
                </td>
            </tr>
        </table>

    </form>
@endsection
