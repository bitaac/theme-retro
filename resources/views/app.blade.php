<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="{{ asset('bitaac/retro-theme/images/favicon.png') }}">

        <!-- Stylesheets -->
        <link href="{{ asset('bitaac/retro-theme/css/app.css?v=14534524686') }}" rel="stylesheet" media="all">
        <link href="{{ asset('bitaac/retro-theme/css/colorbox.css?v=1454524555') }}" rel="stylesheet" media="all">
        <link href="{{ asset('bitaac/retro-theme/wysiwyg/dist/ui/trumbowyg.min.css') }}" rel="stylesheet" media="all">

        <title>OTServer &mdash; bitaac</title>
    </head>
    <body>

        <section id="pandaac">
            <header id="header">
                <a href="{{ url('/') }}"><img src="{{ asset('bitaac/retro-theme/images/header-left.png') }}" alt="Tibia"></a>
            </header>

            <aside id="topbar">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/guilds') }}">Guilds</a></li>
                    <li><a href="{{ url('/online') }}">Who Is Online</a></li>
                    <li><a href="#">Staff</a></li>
                    <li><a href="#">Faq</a></li>
                </ul>
            </aside>

            <div id="content-container">
                <aside id="sidebar">
                    <section id="sidebar-links">
                        <div class="line"></div>
                        <div class="line wide"></div>

                        <ul>
                            <li><a href="{{ url('/') }}">News</a></li>
                            <li><a href="{{ url('/account') }}">Account</a></li>
                            @if (Auth::check())
                                <li><a href="{{ url('/account/logout') }}">Log Out</a></li>
                            @else
                                <li><a href="{{ url('/register') }}">Sign Up</a></li>
                            @endif
                            <li><a href="{{ url('/character') }}">Characters</a></li>
                            <li><a href="{{ url('/highscore') }}">High Score</a></li>
                            <li><a href="{{ url('/forum') }}">Forum</a></li>
                            <li><a href="{{ url('/deaths') }}">Deaths</a></li>
                            <li><a href="{{ url('/store') }}">Shop Offers</a></li>
                            <li><a href="{{ url('/store/offers') }}">Buy Points</a></li>
                            @if (Auth::check() && Auth::user()->isAdmin())
                                <li><a href="{{ url('/admin') }}">Adminpanel</a></li>
                            @endif
                        </ul>

                        <div class="line wide"></div>
                        <div class="line"></div>
                    </section>

                    <section id="sidebar-misc">
                        <div class="line"></div>
                        <a href="{{ url('/account') }}" class="martel">My Account</a>
                        <div class="line"></div>

                        <br>

                        <a href="{{ url('/online') }}">Players Online</a>
                        <div class="line"></div>
                        <a href="{{ url('/online') }}">
                            {{ 
                                str_e(':online :players', [
                                    'online'  => app('player')->getOnlineList()->count(),
                                    'players' => str_plural('player', app('player')->getOnlineList()->count())
                                ]) 
                            }}
                        </a>
                        <div class="line"></div>
                    </section>
                </aside>

                <div id="main-container">
                    <main id="main">
                        <div id="content">
                            <ul id="breadcrumbs">
                                <li><a href="{{ url('/') }}">Home</a>
                                @yield('breadcrumbs')
                            </ul>

                            @yield('heading')

                            @include('bitaac::partials.notification')

                            @yield('content')
                        </div>
                    </main>

                    <div id="copyright">
                        Copyright <span>OTServer</span>. All rights reserved. Powered by <a href="#">bitaac</a>.
                    </div>
                </div>
            </div>
        </section>


        <!-- Javascripts -->
        <script src="{{ asset('bitaac/retro-theme/js/app.js') }}"></script>
        <script src="{{ asset('bitaac/retro-theme/wysiwyg/dist/trumbowyg.min.js') }}"></script>
        <script>
            $('#reply').trumbowyg({
                fullscreenable: false
            });
        </script>
    </body>
</html>
