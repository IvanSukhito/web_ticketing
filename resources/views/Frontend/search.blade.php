@extends('layouts.homeUser')

@section('content')


    <section class="hero">

        {{-- card acara --}}
        @foreach ($acaras as $acara)
            <a href="{{ route('detail', $acara->slug) }}">
                <!-- <img src="{{ $acara->thumbnail }}" alt="{{ $acara->name }}"> -->
                <div class="card-container">
                    <div class="card-image"><img src="{{ $acara->thumbnail }}" alt="{{ $acara->name }}" class="card-image">
                    </div>
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
