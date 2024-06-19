<!DOCTYPE html>
<html lang="en">

<head>
    @section('head')
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @show
    <style>
    .pagination {
        margin-top: 20px;
    }
    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/frontend/details.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @show
    <!-- Icon -->
    @section('script-top')
        <script src="https://unpkg.com/feather-icons"></script>
        <script src="https://kit.fontawesome.com/f362925cfe.js" crossorigin="anonymous"></script>
    @show
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('img/ticoz.png') }}" alt="Logo">
                <h1>Ticoz</h1>
            </a>
            <form action="{{ route('frontend.search') }}" method="GET">
                <div class="search-bar">
                    <i data-feather="search" class="search-icon"></i>
                    <input type="text" placeholder="Search Event" name="keyword">
                </div>
            </form>

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                @guest
                    @if (Route::has('login'))
                        <a class="btn btn-info" href="{{ route('login') }}">{{ __('SignIn') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="btn btn-primary" href="{{ route('register') }}">{{ __('SignUp') }}</a>
                    @endif
                @else
                </div>
                @if (Auth::check())
                    <div class="icon-nav">
                        <div class="icon-nav-list">
                            <a href="#"><i data-feather="bell"></i></a>
                        </div>
                        <div class="Profile">
                            <img src="{{ asset('img/profile.png') }}" alt="casey">
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </span>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @endif
            </nav>
            <div class="list">
                <div class="hastag">
                    <a href="#">#TICOZPROMO</a>
                    <a href="#">TicozScreen</a>
                    <a href="#">Ticos_Live</a>
                </div>
                <div class="ticoz-contact">
                    <a href="#">Tentang Ticoz</a>
                    <a href="#">Blog</a>
                    <a href="#">Hubungi Kami</a>
                </div>
            </div>
        </header>
        @yield('content')

        @section('script-bottom')
            <script>
                feather.replace();
            </script>
            <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
            <script src="{{ asset('js/frontend/swiper-bundle.min.js') }}"></script>
            <script src="{{ asset('js/frontend/script.js') }}"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
            </script>
        @show
    </body>

    </html>
