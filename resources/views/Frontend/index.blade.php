@extends('layouts.homeUser')


@section('content')


    <section class="hero">


        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($banner as $key => $banner)
                    <div class="carousel-item {{ $banner->prioritas == 1 ? 'active' : '' }}" data-id="{{ $key }}"
                        data-prioritas="{{ $banner->prioritas }}">
                        <img src="{{ Storage::url($banner->img) }}" class="d-block w-100" alt="...">
                    </div>
                @empty
                    <div class="carousel-item">
                        <img src="{{ asset('img/slider/2.png') }}" class="d-block w-100" alt="...">
                    </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
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
        <div class="container">

            @foreach ($acaras as $acara)
                <div class="card m-2" style="width: 18rem;">
                    <img src="{{ $acara->thumbnail }}" class="card-img-top custom-card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $acara->name }}</h5>
                        <p class="card-text">{{ $acara->lokasi }}</p>
                        <a href="{{ route('detail', $acara->slug) }}" class="btn btn-primary">@lang('Lihat Detail')</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $acaras->links('pagination::bootstrap-4') }}
        </div>


    </section>

@endsection
@section('script-bottom')
    @parent
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //$("#category").select2();



            $('#carouselExampleAutoplaying .carousel-control-prev, #carouselExampleAutoplaying .carousel-control-next')
                .click(function() {
                    // Temukan item aktif saat ini dan ubah prioritasnya
                    var activeItem = $('.carousel-item.active');
                    console.log(activeItem);
                    activeItem.each(function() {
                        $(this).attr('data-prioritas', 1);
                        console.log('Item aktif sekarang:', $(this).data('id'));
                    });
                });
        });
    </script>

@stop
