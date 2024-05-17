<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jazz Fest 2023</title>
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>
        <header>
            <h1>Ticoz</h1>
            <nav>
                <a href="#">
                    Home</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </nav>
        </header>

        <main>
            <section class="banner">
                <img src="{{ asset('img/festival.jpg') }}" alt="World Jazz Day" width="100%" height="350rem">
                <div class="banner-content">
                    <img src="{{ $acara->thumbnail }}" class="tiket" alt="Tiket">

                    <div class="description">
                        <p>ini deskripsi : {{ $acara->description }}
                        </p>
                        <p>
                            Lokasi : {{ $acara->lokasi }}
                        </p>
                        <p>
                            Tanggal : {{ $acara->waktu->format('d M y') }}
                        </p>
                        <p>
                            Jam {{ $acara->waktu->format('H:i A') }}
                        </p>
                        <p>
                            ini kategori : {{ $acara->category->name }}
                        </p>
                        <p>
                            <b>

                                @if ($acara->tickets->isNotEmpty())
                                    <span>Mulai dari Rp
                                        {{ number_format($acara->tickets->first()->harga) }}</span><!-- Mengambil harga tiket pertama jika ada -->
                                @else
                                    <span>Tidak ada tiket tersedia</span>
                                @endif

                            </b>
                        </p>

                    </div>

                </div>
                <div class="buy-button">
                    <a href="/checkout">Buy Ticket</a>
                </div>
            </section>

            <section class="other-events">
                <h2>Lainnya</h2>
            </section>

            <div class="image-container">
                <div class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 1"></div>
                <div class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 2"></div>
                <div class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 3"></div>
                <div class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 4"></div>
                <div class="box"><img src="{{ asset('img/images.jpg') }}" alt="Gambar 5"></div>
            </div>
        </main>

        <footer>
            <p>&copy; 2024 Ticoz. All Rights Reserved.</p>
        </footer>
    </body>

    </html>
