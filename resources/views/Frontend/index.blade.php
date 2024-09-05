@extends('layouts.frontend')


@section('content')

<div class="header-carousel owl-carousel">
    @forelse ($banner as $key => $banner)
            <div class="container">
                <img src="{{ Storage::url($banner->img) }}" class="d-block w-100" alt="...">
            </div>
    @empty
    <div class="carousel-item">
        <img src="{{ asset('img/slider/2.png') }}" class="d-block w-100" alt="...">
    </div>
    @endforelse
    
                
  
</div>

<div class="container-fluid feature bg-light py-5">
    <div class="container" style="justify-content: center;">
        
        <form>
          
            <h3 class="display-4 mb-4 text-primary" style="text-transform: uppercase; font-size: 36px; font-weight: 900;">Filter WhatEver You Want</h3>

            <br>
            <div class="row ">
                <div class="col-lg-12 col-xl-9">
                    <div class="form-floating">
                        <input type="date" class="form-control border-0" id="name" placeholder="Your Name">
                        {{-- <label for="name">Tanggal </label> --}}
                    </div>
                </div>
                <div class="col-lg-12 col-xl-3">
                    <div class="form-floating">
                        <select class="form-select border-0" id="harga" aria-label="Harga">
                            <option selected>Pilih Harga</option>
                            <option value="murah">Murah</option>
                            <option value="sedang">Sedang</option>
                            <option value="mahal">Mahal</option>
                        </select>
                        {{-- <label for="harga">Harga</label> --}}
                    </div>
                    
                    
                </div>
              
              
            </div>
        </form>
    </div>
</div>
       <!-- Service Start -->
       
    <!-- Service End / Recently Event -->
    <div class="container-fluid testimonial ">
        <div class="container p-5" style="justify-content: center;">
            <div data-wow-delay="0.2s" style="max-width: 800px;">
                <h3 class="display-4 mb-4" style="text-transform: uppercase; font-size: 36px; font-weight: 900;">Recently Event</h3>

            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.2s">
                @foreach ($acaras as $acara)
                <div class="acara-item bg-light rounded">
                    <div class="row g-0">
                        <div class="col-4 col-lg-4 col-xl-3">
                            <div class="h-100">
                                <img src="{{ $acara->thumbnail }}" class="img-fluid h-100 rounded" style="object-fit: cover;" alt="{{ $acara->client_name }}">
                            </div>
                        </div>
                        <div class="col-8 col-lg-8 col-xl-9">
                            <div class="d-flex flex-column my-auto text-start p-4">
                                <h4 class="text-dark mb-0">{{ $acara->name }}</h4>
                                <p class="mb-3">{{ $acara->lokasi }}  - <span class="text-primary">{{ \Carbon\Carbon::parse($acara->waktu)->format('H:i') }}</span>
                                </p>
                                <p class="text-primary">
                                    {{ \Carbon\Carbon::parse($acara->waktu)->format('l, d F Y') }}
                                </p>
                                <div class="d-flex text-primary mb-3">
                                </div>
                                <a href="{{ route('detail', $acara->slug) }}" class="btn btn-primary rounded-pill py-2 px-4">@lang('See More')</a>
                    
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    
            <!-- Owl Carousel Navigation -->
          
        </div>
    </div>

    <!-- Comming Soon -->
   <div class="container-fluid team ">
            <div class="container py-5">
              
                    <h3 class="display-4 mb-4" style="text-transform: uppercase; font-size: 36px; font-weight: 900;">Our Coming Soon Event</h3>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset("img/com_event.jpg") }}" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon">
                                   
                                    <a class="btn btn-success btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-whatsapp"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">David James</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset("img/com_event1.jpg") }}" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon">
                                   
                                    <a class="btn btn-success btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-whatsapp"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">David James</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset("img/com_event.jpg") }}" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon">
                                   
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-whatsapp"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">David James</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="{{ asset("img/com_event1.jpg") }}" class="img-fluid rounded-top w-100" alt="">
                                <div class="team-icon">
                                   
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i class="fab fa-whatsapp"></i></a>
                                    <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="team-title p-4">
                                <h4 class="mb-0">David James</h4>
                                <p class="mb-0">Profession</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Include this script at the end of your page -->
    
    

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
    <script>
        $(document).ready(function(){
            $('.testimonial-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                navText: [
                    $('.owl-prev').html(),
                    $('.owl-next').html()
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
    
            // Custom navigation events
            $('.owl-prev').click(function() {
                $('.testimonial-carousel').trigger('prev.owl.carousel');
            });
            $('.owl-next').click(function() {
                $('.testimonial-carousel').trigger('next.owl.carousel');
            });
        });
    </script>
    

@stop
