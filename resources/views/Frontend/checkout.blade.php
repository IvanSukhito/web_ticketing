<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticoz - Pembelian Tiket</title>
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    </head>

    <body>
        <header>
            <h1>Ticoz</h1>
            <nav>
                <a href="#">Home</a>
            </nav>
        </header>
        <main>
            <div class="form-container">
                <div class="form-left">
                    <h2>Detail Pemesanan Event</h2>
                    <form>
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="event-date">Tanggal Acara</label>
                            <input type="date" id="event-date" name="event-date" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn">Lanjutkan</button>
                        </div>
                    </form>
                </div>
                <div class="form-right">
                    <h2>Metode Pembayaran</h2>
                    <div class="payment-methods">
                        <label><input type="radio" name="payment" value="credit-card"> Kartu Kredit</label>
                        <label><input type="radio" name="payment" value="bank-transfer"> Transfer Bank</label>
                        <label><input type="radio" name="payment" value="e-wallet"> E-Wallet</label>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Ticoz. All Rights Reserved.</p>
        </footer>
    </body>

    </html>
