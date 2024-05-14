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
                    <img src="{{ asset('img/tiket.jpeg') }}" class="tiket" alt="Tiket">

                    <div class="description">
                        <p>Jazz Fest adalah Acara yang diselenggarakan selama 7 hari hingga dan <br>
                            menampilkan berbagai jenis musik jazz yang beragam, mulai dari jazz tradisional hingga jazz <br>
                            kontemporer.
                        </p>
                        <p>
                            Lokasi : Jakarta
                        </p>
                        <p>
                            Tanggal: Senin, 25 Maret 2023
                        </p>
                        <p>
                            Jam: 09:00 - 12:00
                        </p>
                        <p>
                            <b>Rp. 250.000 </b>
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
