@extends('bitaac::app')

{{-- Page breadcrumbs. --}}
@section('breadcrumbs')
    <li>Community
    <li>Guilds
@stop

{{-- Page content. --}}
@include('bitaac::partials.heading', ['title' => 'Guilds', 'desc' => 'Information abouts guild on {server}.'])

@section('content')
    <table>
        <tr class="header">
            <th colspan="3">Title</th>
        </tr>
        <tr>
            <th>Logo</th>
            <th width="100%">Description</th>
            <th></th>
        </tr>

        {{-- Guilds. --}}
        @forelse ($guilds as $guild)
            <tr>
                {{-- Logo field. --}}
                <td valign="middle">
                    @if ($guild->bitaac->logo)
                        <img src="{{ $guild->logoLink() }}" width="64" height="64">
                    @else
                        <img src="{{ asset('bitaac/retro-theme/images/guild.gif') }}" width="64" height="64">
                    @endif
                </td>

                {{-- Name & description fields. --}}
                <td valign="middle">
                    <strong>{{ $guild->name }}</strong>

                    @if ($guild->bitaac->description)
                        <br>{{ $guild->bitaac->description }}
                    @endif
                </td>

                {{-- View button. --}}
                <td valign="middle">
                    <a href="{{ $guild->link() }}" class="button">View</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">There are no guilds as of right now, why dont you go ahead and create one?</td>
            </tr>
        @endif
    </table>

    {{-- Found guild button. --}}
    <table>
        <tr class="transparent noborderpadding">
            <td>
                <a href="{{ url('/guilds/create') }}" class="button">Create Guild</a>
            </td>
        </tr>
    </table>
@endsection
