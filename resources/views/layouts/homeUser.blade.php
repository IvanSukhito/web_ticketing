
<!DOCTYPE html>
<html lang="en">
<head>
@section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @show
    <title>Ticoz</title>
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/swiper-bundle.min.css') }}">

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
                <img src="/Assets/Logo.png" alt="Logo">
                <h1>Ticoz</h1>
            </a>

            <div class="search-bar">
                <i data-feather="search" class="search-icon"></i>
                <input type="text" placeholder="Search Event">
            </div>
            @guest
                    @if (Route::has('login'))            
                            <a class="nav-link" href="{{ route('login') }}">{{ __('SignIn') }}</a>      
                    @endif
                    @if (Route::has('register')) 
                            <a class="nav-link" href="{{ route('register') }}">{{ __('SignUp') }}</a>                                
                    @endif
            @else
            <div class="icon-nav">
                <div class="icon-nav-list">
                    <a href="#"><i data-feather="bell"></i></a>
                    <a href="#"><i class="fa-solid fa-clock-rotate-left"></i></a>
                </div>
                <div class="Profile">
                    <img src="/Assets/Casey.jpg" alt="casey">
                    <h2>Casey</h2>
                </div>
            </div>
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
      @show
</body>
</html>