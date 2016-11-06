@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li>404 Not Found
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Not Found', 'desc' => ''])
    
    <p>Whoops! We can't seem to find the page you're looking for.</p>
@endsection
