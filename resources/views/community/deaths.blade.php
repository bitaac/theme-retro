@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li>Community
        <li>Latest Deaths
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Latest Deaths', 'desc' => ''])

    <table>
        <tr class="header">
            <th colspan="3">Latest Deaths</th>
        </tr>

        {{-- Characters. --}}
        @forelse ($deaths as $death)
            <tr>
                <td width="22%">{{ date('M d Y, H:i:s T', (int) $death->time) }}</td>

                <td>
                    {!!
                        str_e(':player died on level :level by :killed_by and :mostdamage_by.', [
                            'player'        => '<a href="'. e($death->player->link()) .'">'. e($death->player->name) .'</a>',
                            'level'         => $death->level,
                            'killed_by'     => e($death->killed_by),
                            'mostdamage_by' => e($death->mostdamage_by)
                        ], false)
                    !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">There are no deaths to show.</td>
            </tr>
        @endif
    </table>
@endsection
