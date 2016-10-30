@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
    	<li>Community
    	<li>Who Is Online
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Who Is Online', 'desc' => '<p>There are currently <strong>'.$online->count().'</strong> players online. The record holds a total of <strong>'.$player->getOnlineRecord().'</strong> players.</p>'])

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
        @forelse ($online as $character)
            <tr>
                {{-- Name field. --}}
                <td><a href="{{ $character->link() }}">{{ $character->name }}</a></td>

                {{-- Level field. --}}
                <td>{{ $character->level }}</td>

                {{-- Vocation field. --}}
                <td>{{ vocation($character->vocation) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">There are no players online at this moment.</td>
            </tr>
        @endif
    </table>
@endsection
