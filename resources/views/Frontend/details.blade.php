@extends('layouts.homeUser')

@section('content')
    <main>

        <head>
            <img src="{{ $acara->thumbnail }}" alt="{{ $acara->name }}" class="event-banner">
        </head>
        <section class="banner">
            <div class="banner-content">
                <div class="event-hero">
                    <div class="detail-event">
                        <div class="description">
                            <h4>{{ $acara->name }}</h4><br>
                            <p>{{ $acara->description }}</p>
                        </div>
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
                        @if ($ticket = $acara->ticket)
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
                        @else
                            <p>No tickets available for this event.</p>
                        @endif

                    </div>
                </div>
            </div>
        </section>
    @endsection
