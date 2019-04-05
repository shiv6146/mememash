<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Meme Mash for Geeks</title>

    <!-- Styles -->
  
    <link rel="stylesheet" href="{{ asset('web/assets/mobirise-icons/mobirise-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('soundcloud-plugin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dropdown/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('socicon/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('gallery/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mobirise/css/mbr-additional.css') }}" type="text/css">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    
    <section class="menu cid-qInS0EFrZB" once="menu" id="menu3-2" data-sortbtn="btn-primary">

        <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg" style="background: #365c9a;">
            <div class="navbar-brand">
                
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-2">Meme Mash</a></span>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true" style="padding-right: 80px;">

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ route('leaderboard') }}">
                                Top Memes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link text-white display-4" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <div class="dropdown-menu">
                                <a class="text-white dropdown-item display-4" href="{{ route('post') }}">Post</a>
                                <a class="nav-link link text-white display-4" href="{{ route('leaderboard') }}">Leaderboard</a>
                                <a class="text-white dropdown-item display-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>
    </section>

    @yield('content')
    

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('popper/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('mobirise-shop/script.js') }}"></script>
    <script src="{{ asset('dropdown/js/script.min.js') }}"></script>
    <script src="{{ asset('touchswipe/jquery.touch-swipe.min.js') }}"></script>
    <script src="{{ asset('mbr-animated-bg-text/mbr-animated-bg-text.js') }}"></script>
    <script src="{{ asset('smoothscroll/smooth-scroll.js') }}"></script>
    <script src="{{ asset('playervimeo/vimeo_player.js') }}"></script>
    <script src="{{ asset('parallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('mbr-popup-btns/mbr-popup-btns.js') }}"></script>
    <script src="{{ asset('countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('mbr-flip-card/mbr-flip-card.js') }}"></script>
    <script src="{{ asset('theme/js/script.js') }}"></script>
    <script src="{{ asset('gallery/player.min.js') }}"></script>
    <script src="{{ asset('gallery/script.js') }}"></script>
    <script src="{{ asset('js/post.js') }}"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
