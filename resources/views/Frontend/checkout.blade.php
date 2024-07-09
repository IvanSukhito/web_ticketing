<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticoz - Pembelian Tiket</title>
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    </head>

    <body>
        <header class="bg-light py">
            <h1>Ticoz</h1>
            <nav>
                <a href="{{ route('home') }}">Home</a>
            </nav>
        </header>
        <main>
            {{-- detail acara --}}
            <div class="acara-container">
                <div class="detail-acara">
                    <h2>Detail Acara</h2>
                    <div>
                        <img src="{{ $acara->thumbnail }}" class="card-img-top custom-card-img" alt="...">
                    </div>
                    <p class="nama-acara"></i><strong> {{ $acara->name }}</p></strong>
                    <p><i class="fas fa-calendar-alt"> </i> {{ $acara->waktu->format('d-m-Y') }}</p>
                    <p><i class="fas fa-clock"> </i>{{ $acara->waktu->format('H:i') }}</p>
                    <p><i class = "fas fa-map-marker-alt"></i> {{ $acara->lokasi }}</p>
                    <hr>
                    @if ($acara->ticket->kuantitas)
                        <p><strong>Stok Tiket :</strong> {{ $acara->ticket->kuantitas }}</p>
                    @else
                        <p><strong>Stok Tiket :</strong> Tiket Kosong</p>
                    @endif

                    <p><strong>Max Pembelian Tiket :</strong> {{ $acara->ticket->max_buy }}/user</p>
                    <p><strong>Harga Tiket:</strong> Rp {{ number_format($acara->ticket->harga, 0, ',', '.') }}</p>

                </div>
            </div>
            <div class="form-container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('checkout-pay') }}" enctype="multipart/form-data"
                    class="checkout-form">
                    @csrf

                    <div class="form-left">
                        <h2>Detail Pemesanan Event</h2>
                        {{-- <input type="hidden" name="acara_id" value="{{ $acara->id }}"> --}}
                        <div class="form-group">
                            <label for="name">Nama Panjang</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea id="address" name="address" class="form-control" style="resize:none;" rows="10" cols="50"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn">Lanjutkan</button>
                        </div>
                    </div>
                    <div class="form-right">
                        <h2>Metode Pembayaran</h2>
                        <div class="payment-methods">
                            <label><input type="radio" name="payment" value="credit-card"> Kartu Kredit</label>
                            <label><input type="radio" name="payment" value="bank-transfer"> Transfer Bank</label>
                            <label><input type="radio" name="payment" value="e_wallet"> E-Wallet</label>
                            <label><input type="radio" name="payment" value="qris"> Qris</label>
                        </div>

                    </div>
                </form>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Ticoz. All Rights Reserved.</p>
        </footer>
    </body>

    </html>
