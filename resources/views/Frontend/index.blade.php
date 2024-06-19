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
            @forelse ($categories as $category)
                <div class="card-info">
                    <a href="{{ route('front.category', $category) }}">
                        <img src="{{ Storage::url($category->icon) }}" alt="card">
                        <p>{{ $category->name }}</p>
                    </a>
                </div>
            @empty
                <p>Category Tidak tersedia</p>
            @endforelse
        </div>


        {{-- card acara --}}
        @foreach ($acaras as $acara)
            <!-- <a href="{{ route('detail', $acara->slug) }}"> -->
                <!-- <img src="{{ $acara->thumbnail }}" alt="{{ $acara->name }}"> -->
                <!-- <div class="card-container">
                    <div class="card-image"><img src="{{ $acara->thumbnail }}" alt="{{ $acara->name }}" class="card-image">
                    </div>
                    <div class="card-detail">
                        <h3>{{ $acara->name }}</h3>
                        <p>{{ $acara->description }}</p>
                        <span>Mulai dari Rp {{ number_format($acara->start_from, 0, ',', '.') }}</span>
                    </div>
                </div>
            </a> -->
        <div class="card m-2" style="width: 18rem;">
          <img src="{{$acara->thumbnail}}" class="card-img-top custom-card-img" alt="..." >
          <div class="card-body">
            <h5 class="card-title">{{$acara->name}}</h5>
            <p class="card-text">{{$acara->lokasi}}</p>
            <a href="{{ route('detail', $acara->slug) }}" class="btn btn-primary">See {{$acara->name}}</a>
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
