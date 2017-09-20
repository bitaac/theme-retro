@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li>Community
    	<li>Who Is Online
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Who Is Online', 'desc' => '<p>There are currently <strong>'.$players->count().'</strong> players online. The record holds a total of <strong>'.getOnlineRecord().'</strong> players.</p>'])

    <table>
        <tr class="header">
            <th colspan="3">Who Is Online</th>
        </tr>
        <tr>
            <th width="70%">Name</th>
            <th>Level</th>
            <th>Vocation</th>
        </tr>

        {{-- Characters. --}}
        @forelse ($players as $player)
            <tr>
                {{-- Name field. --}}
                <td><a href="{{ $player->link() }}">{{ $player->name }}</a></td>

                {{-- Level field. --}}
                <td>{{ $player->level }}</td>

                {{-- Vocation field. --}}
                <td>{{ vocation($player->vocation) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">There are no players online at this moment.</td>
            </tr>
        @endif
    </table>
@endsection
