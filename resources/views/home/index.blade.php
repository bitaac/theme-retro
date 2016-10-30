@extends('bitaac::app')

{{-- Page breadcrumbs. --}}
@section('breadcrumbs')
    <li>Latest News
@stop

{{-- Page content. --}}
@include('bitaac::partials.heading', ['title' => 'Latest News', 'desc' => 'Here you will find the latest news about the server.<br>Come back often to stay informed about important changes in the game.'])

@section('content')
    @forelse($news->threads as $post)
        <article class="news">
            <header class="news-header">
                <span class="news-date">{{ date('M d Y') }} -</span>
                <h2>{{ $post->title }}</h2>
            </header>

            <div class="news-content">
                {!! strip_tags($post->content, '<p><h1><h2><strong><em><b><i><ul><ol><li><u><strike><hr><br><a><img>') !!}
            </div>
            <footer class="news-footer">
                Published by <a href="{{ $post->player->link() }}">{{ $post->player->name }}</a> in <a href="{{ $post->board->link() }}">{{ $post->board->title }}</a> (<a href="{{ $post->link() }}">{{ $post->replies->count() }}</a>).
            </footer>
        </article>
    @empty
        <article class="news">
            <header class="news-header">
                <span class="news-date">{{ date('M d Y') }} -</span>
                <h2>Welcome to bitaac</h2>
            </header>

            <div class="news-content">
                Hello & welcome to bitaac! <br>
                This is just a placeholder news, you can remove it anytime by create a news record 
                <a href="{{ url('/forum/latest-news') }}">here</a>.
            </div>
            <footer class="news-footer">
                Published by <a href="#">Cornex</a> in <a href="#">bitaac</a> (<a href="#">0</a>).
            </footer>
        </article>
    @endforelse
@endsection
