@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li>Store
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Store', 'desc' => ''])

    <table>
        <tr class="transparent nopadding">
            <td width="70%"></td>
            <td align="right" valign="top">
                @if (Auth::check())
                    <p>You currently have <span class="inline-box green">{{ $account->bit->points }}</span> points.</p>
                @endif
            </td>
        </tr>
    </table>

    @if ($products->count())
        <div class="store-products">
            {{-- Products. --}}
            @foreach ($products as $product)
                <div class="product">
                    <header class="header">{{ $product->title }}</header>

                    <div class="content">
                        <h4>
                            {{ $product->item_count }}x

                            {{ $product->title }}
                        </h4>

                        <img src="https://cdn.rawgit.com/pandaac-cdn/items/1076/{{ $product->item_id }}.gif" width="32" height="32">

                        <br><br>

                        @if ($product->description)
                            <p>{{ e(lines($product->description, 3)) }}</p>
                        @endif
                        
                        <footer class="footer">
                            @if (Auth::check() and Auth::user()->bit->points >= $product->points)
                                <a href="{{ url('/store/claim/'.str_slug($product->title)) }}" class="claim">Claim for <span>{{ $product->points }}</span> points!</a>
                                <small>
                                    ... or <a href="{{ url('/store/offers') }}">purchase points</a>!
                                </small>
                            @else
                                <a href="#" class="claim disabled">costs <span>{{ $product->points }}</span> points</a>
                                <small>
                                    <a href="{{ url('/store/offers') }}">Purchase points</a> now!
                                </small>
                            @endif
                        </footer>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <table>
            <tr class="header">
                <th>Store</th>
            </tr>
            <tr>
                <td>There are no products as of right now. You can still purchase points if you want to get a head start, but do so at your own incentive.</td>
            </tr>
        </table>
    @endif
@stop