@extends('layouts.homeUser')

@section('content')
    <section class="hero">
        <div class="card swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="/Assets/background-image.png" alt="event"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>

        </div>
        {{-- card category --}}
        <div class="card1">
            <div class="card-info">
                <a href="#">
                    <img src="/Assets/Muichiro.jpg" alt="card">
                    <p>Muichiro</p>
                </a>
                <a href="#">
                    <img src="/Assets/Muichiro.jpg" alt="card">
                    <p>Muichiro</p>
                </a>
                <a href="#">
                    <img src="/Assets/Muichiro.jpg" alt="card">
                    <p>Muichiro</p>
                </a>
                <a href="#">
                    <img src="/Assets/Muichiro.jpg" alt="card">
                    <p>Muichiro</p>
                </a>
                <a href="#">
                    <img src="/Assets/Muichiro.jpg" alt="card">
                    <p>Muichiro</p>
                </a>
                <a href="#">
                    <img src="/Assets/Muichiro.jpg" alt="card">
                    <p>Muichiro</p>
                </a>
            </div>
        </div>
        {{-- card acara --}}
        @foreach ($acaras as $acara)
            <div class="container">
                <a href="#">
                    <div class="card-container">
                        <div class="card-image muichiro"></div>
                        <img src="{{ $acara->thumbnail }}" alt="{{ $acara->name }}">
                        <div class="card-detail">
                            <h3>{{ $acara->name }}</h3>
                            <p>{{ $acara->description }}</p>
                            <span>Mulai dari Rp {{ number_format($acara->start_from) }}</span>
                        </div>
                    </div>
            </div>
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
