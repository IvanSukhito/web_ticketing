@extends('layouts.frontend')

@section('content')


    <section class="hero">
        {{-- card acara --}}
       
           

        <div class="container">
        @forelse ($acaras as $acara)
            <a href="{{ route('detail', $acara->slug) }}" style="text-decoration:none">
                <div class="card m-2" style="width: 18rem;">
                    <img src="{{ $acara->thumbnail }}" class="card-img-top custom-card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $acara->name }}</h5>
                        <p class="card-text">{{ $acara->lokasi }}</p>
                        <span>Mulai dari Rp {{ number_format($acara->start_from) }}</span>

                    </div>
                </div>
                </a>
                @empty
                    <p>Acara Tidak ada</p>
                @endforelse
        </div>

            

       


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
