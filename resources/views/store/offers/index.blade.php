@extends('bitaac::app')

@section('content')
    {{-- Page breadcrumbs. --}}
    @section('breadcrumbs')
        <li><a href="{{ url('/store') }}">Store</a>
        <li>Offers
    @stop

    {{-- Page content. --}}
    @include('bitaac::partials.heading', ['title' => 'Store', 'desc' => ''])

    <div class="store-products">
        {{-- Products. --}}
        
        @if(config('bitaac.gateways.paypal.enabled'))
            <div class="product" style="height: 280px;">
                <header class="header">Pay with PayPal</header>

                <div class="content" style="height: 245px;">

                    <img style="margin-top:10px;margin-bottom:10px;" src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png?01RI=83C4981D28BC63E,cm:akamai.mathtag.com%2fevent%2fimg%3fakam_state%3d0%26no_log%26mt_nsync%26mm_bnc%26relay%3dhttp%253A%252F%252Fak-sync.datasvc.mediamath.com%252Ffcgi.insight-drp%253Furl%253D-%2526referer%253Drelaytest%2526ip_address%253D127.0.0.1%2526cpcode%253D52202%2526akid%253D34aNKCqxiWRJ403npq_7n1nfLiN0krDAVAjfLfSR4eOPlaVV2hr4uMg%2526blob-id%253D7%2526blob%253D%255BMM_UUID%255D%255Cr%255Cn&01NA=ck&" width="170" height="51">

                    <br><br>

                    <p>PayPal is the faster, safer way to send money, make an online payment, receive money or set up a merchant account.</p>
                    
                    <footer class="footer">
                        <a href="{{ url('/store/offers/paypal') }}" class="claim">Pay with PayPal</a>
                        <small>
                            <!--  -->
                        </small>
                    </footer>
                </div>
            </div>
        @endif
    </div>
@stop