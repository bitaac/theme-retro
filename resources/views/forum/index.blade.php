@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumb. --}}
    @section('breadcrumbs')
    	<li>Forum
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Forum', 'desc' => ''])

    <table>
        <tr class="header">
            <th width="60%">Board</th>
            <th>Posts</th>
            <th>Threads</th>
            <th>Latest Post</th>
        </tr>

        {{-- Boards. --}}
        @forelse ($boards as $board)
            <tr>
                <td>
                    {{-- Title field. --}}
                    <a href="{{ url_e('/forum/:title', ['title' => $board->title]) }}">{{ $board->title }}</a>

                    {{-- Description field. --}}
                    @if ($board->description)
                        <br>{{ $board->description }}
                    @endif
                </td>

                {{-- Total posts field. --}}
                <td>{{ $board->replies->count() }}</td>

                {{-- Total threads field. --}}
                <td>{{ $board->threads->count() }}</td>

                {{-- Latest post field. --}}
                <td>
                    @if ($board->threads->count())
                        <?php 
                            $latest = $board->latest();
                        ?>

                        <a href="{{ url_e('/forum/:board/:title', ['board' => $board->title, 'title' => $latest->title]) }}">
                            {{ $latest->title }}
                        </a>

                        <br>

                        <small>
                            by
                            <a href="{{ url_e('/forum') }}">
                                <img src="{{ asset('bitaac/retro-theme/images/forum-latest.png') }}" class="forum-post-latest" width="8" height="8">
                            </a>

                            <a href="{{ $latest->player->link() }}">
                                {{ $latest->player->name }}
                            </a>,

                            <abbr title="{{ date('M d Y, H:i:s T', $latest->timestamp) }}">
                                {{ ago($latest->timestamp) }}
                            </abbr>
                        </small>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">There are no forum boards as of right now.</td>
            </tr>
        @endforelse

        <tr class="header">
            <th colspan="4"><small>All times are {{ date('T') }}.</small></th>
        </tr>
    </table>
@stop
