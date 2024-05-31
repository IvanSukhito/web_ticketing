@extends('layouts.homeUser')

@section('content')



<div class="banner-content">

    <div class="event-hero">
    <img src="{{ $acara->thumbnail }}" alt="{{ $acara->name }}" class="event-banner">
        <div class="detail-event">
           
            <div class="detail-description-event">
                <div class="info-event">
                    <div class="icon-event">
                        <i data-feather="map-pin"></i>
                    </div>
                    <div class="detail-info-event">
                        <p>Location</p>
                        <span>{{ $acara->lokasi }}</span>
                    </div>
                </div>
                <div class="info-event">
                    <div class="icon-event">
                        <i data-feather="align-justify"></i>
                    </div>
                    <div class="detail-info-event">
                        <p>Kategori</p>
                        <span>{{ $category->name ?? '-' }}</span>
                    </div>
                </div>
                <div class="info-event">
                    <div class="icon-event">
                        <i data-feather="calendar"></i>
                    </div>
                    <div class="detail-info-event">
                        <p>Tanggal</p>
                        <span>{{ $acara->waktu->format('d M y') }}</span>
                    </div>
                </div>
                <div class="info-event">
                    <div class="icon-event">
                        <i data-feather="clock"></i>
                    </div>
                    <div class="detail-info-event">
                        <p>Jam</p>
                        <span>{{ $acara->waktu->format('H:i A') }}</span>
                    </div>
                </div>
            </div>
          
        </div>
        <div class="ticket-event">
            <h4>Let's get your tickets</h4>
            @foreach ($acara->tickets as $ticket)
            <div class="kategori-ticket">
                <div class="info-ticket">
                    <p>{{ $ticket->name }}</p>
                    <span class="price">Rp{{ number_format($ticket->harga) }}</span>
                </div>
                <div class="cta">
                    <button class="btn-minus"><i data-feather="minus"></i></button>
                    <p class="box-count">1</p>
                    <button class="btn-plus"><i data-feather="plus"></i></button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="detail-event">
        <!-- DESKRIPSI NANTI DISINI -->
            <div class="description">
                <h4>{{ $acara->name }}</h4><br>
                <p>{{ $acara->description }}</p>
            </div>
          
        </div>
</div>

@endsection

<script>
    $(function() {
        if ($('#totalTickets').text() == 0) {
            $('#bookTicket').addClass('opacity-50 cursor-not-allowed').text('Please select at least 1 ticket');
        }

        $('.minusButton').on('click', function() {
            let inputElement = $(this).siblings('input[type=number]');
            let currentValue = inputElement.val();
            if (currentValue != 0) {
                inputElement.val(--currentValue).trigger('change');
            }
        });

        $('.plusButton').on('click', function() {
            let inputElement = $(this).siblings('input[type=number]');
            let currentValue = inputElement.val();
            let maxValue = inputElement.attr('max');
            if (currentValue < maxValue) {
                inputElement.val(++currentValue).trigger('change');
            }
        });

        $('input[type=number]').on('change keyup mouseup mousewheel', function() {
            let totalTickets = 0;
            let totalPrice = 0;
            $('input[type=number]').each(function() {
                let price = $(this).data('price');
                let quantity = $(this).val();
                totalTickets += parseInt(quantity);
                totalPrice += parseInt(quantity) * parseInt(price);
            });
            $('#totalTickets').text(totalTickets);
            $('#totalPrice').text(totalPrice);

            if (totalTickets > 0) {
                $('#bookTicket').removeClass('opacity-50 cursor-not-allowed').text('Book Tickets Now');
            } else {
                $('#bookTicket').addClass('opacity-50 cursor-not-allowed').text('Please select at least 1 ticket');
            }
        });

        $('#bookTicket').on('click', function(e) {
            if ($('#totalTickets').text() == 0) {
                e.preventDefault();
                $(this).addClass('opacity-50 cursor-not-allowed').text('Please select at least 1 ticket');
            }
        });
    });
</script>
