@extends('layouts.homeUser')

@section('content')
    <section class="hero">
        <div class="card swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('img/slider/2.png') }}" alt="event"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>

        </div>
        {{-- card category --}}
        <div class="card1">
            <div class="card-info">
                <a href="#">
                    <img src="{{ asset('img/cat_film.png') }}" alt="card">
                    <p>Film</p>
                </a>
                <a href="#">
                <img src="{{ asset('img/cat_game.png') }}" alt="card">
                    <p>Game</p>
                </a>
                <a href="#">
                <img src="{{ asset('img/cat_art.png') }}" alt="card">
                    <p>Art</p>
                </a>
                <a href="#">
                       <img src="{{ asset('img/cat_otomatif.png') }}" alt="card">
                    <p>Otomatif</p>
                </a>
                <a href="#">
                       <img src="{{ asset('img/cat_teater.png') }}" alt="card">
                    <p>Teater</p>
                </a>
                <a href="#">
                       <img src="{{ asset('img/cat_music.png') }}" alt="card">
                    <p>Music</p>
                </a>
                <a href="#">
                       <img src="{{ asset('img/cat_sport.png') }}" alt="card">
                    <p>Sport</p>
                </a>
              
            </div>
        </div>
        {{-- card acara --}}
        @foreach ($acaras as $acara)
          
            <a href="{{ route('detail', $acara->slug) }}">
                 <!-- <img src="{{ $acara->thumbnail }}" alt="{{ $acara->name }}"> -->
                <div class="card-container">
                    <div class="card-image"><img src="{{ $acara->thumbnail }}" alt="{{ $acara->name }}" class="card-image"></div>
                    <div class="card-detail">
                    <h3>{{ $acara->name }}</h3>
                            <p>{{ $acara->description }}</p>
                            <span>Mulai dari Rp {{ number_format($acara->start_from) }}</span>
                    </div>
                </div>
            </a>
        @endforeach
       


    </section>

@endsection
@section('script-bottom')
    @parent
    <script type="text/javascript">
        $(document).ready(function() {
            $("#category").select2();
        });
    </script>
@stop
