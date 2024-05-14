<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <header>
        <h1>Ticoz</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <main>
        <section class="other-events">
            <h2>Event</h2>
        </section>

        {{-- @foreach ($acaras as $acara)
            
        @endforeach --}}
        <div class="image-container">
            <a href="/event/1" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 1"></a>
            <a href="/event/2" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 2"></a>
            <a href="/event/3" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 3"></a>
            <a href="/event/4" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 4"></a>
            <a href="/event/5" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 5"></a>
            <a href="/event/5" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 5"></a>

        </div>

        <section class="card-categories">
            <h2>Categories</h2>
        </section>

        <div class="image-container">
            <a href="/event/1" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 1"></a>
            <a href="/event/2" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 2"></a>
            <a href="/event/3" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 3"></a>
            <a href="/event/4" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 4"></a>
            <a href="/event/5" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 5"></a>
            <a href="/event/5" class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 5"></a>


        </div>
    </main>

    <footer>
        <p>&copy; 2024 Ticoz. All Rights Reserved.</p>
    </footer>
</body>

</html>
