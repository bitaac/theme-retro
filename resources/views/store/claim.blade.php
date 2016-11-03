@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li><a href="{{ url('/store') }}">Store</a>
        <li>{{ $product->title }}
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Store', 'desc' => ''])

    <form method="POST">
        {{ csrf_field() }}

        <table>
            <tr class="header">
                <th colspan="2">{{ $product->item_count }}x {{ $product->title }} for {{ $product->points }} points</th>
            </tr>

            <tr>
                <th width="15%"><label>Character:</label></th>
                <td>
                    <select name="character">
                        @foreach (Auth::user()->characters as $character)
                            <option value="{{ $character->id }}">{{ $character->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('email'))
                        <em class="error">{{ $errors->first('email') }}</em>
                    @endif
                </td>
            </tr>

            <tr class="transparent noborderpadding">
                <th></th>
                <td>
                    <input type="submit" class="button" value="Submit">
                    <a href="{{ url('/store') }}" class="button">Back</a>
                </td>
            </tr>
        </table>
    </form>
@stop