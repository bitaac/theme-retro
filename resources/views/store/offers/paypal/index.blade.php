@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li><a href="{{ url('/store') }}">Store</a>
        <li><a href="{{ url('/store/offers') }}">Offers</a></li>
        <li>Paypal
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Store', 'desc' => ''])

    <table>
        <tr class="header">
            <th></th>
            <th width="57%">Product</th>
            <th>Points</th>
            <th>Price</th>
            <th width="120"></th>
        </tr>

        {{-- Products. --}}
        @foreach (config('bitaac.paytal.paypal.offers') as $price => $points)
            <tr>
                <td width="32" height="32" valign="middle" align="center"><img src="https://cdn.pandaac.io/items/1076/2319.gif"></td>
                <td>
                    <strong>Purchase {{ $points }} Points</strong><br>
                    <small>
                        These points are used to claim products from the store at any given time.
                    </small>
                </td>
                <td>{{ $points }}</td>
                <td>{{ $price }} {{ config('bitaac::paypal.currency') }}</td>
                <td>
                    <form method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="amount" value="{{ $price }}">
                        @if (Auth::check())
                            <input type="submit" value="Purchase points!" class="claim limited">
                        @else
                            <input type="submit" value="Login to purchase points!" class="claim limited disabled" disabled="">
                        @endif
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@stop