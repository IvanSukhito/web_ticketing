@extends('layouts.frontend')

@section('content')

<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
      
        <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-primary">About</li>
        </ol>    
    </div>
</div>

<div class="container-fluid bg-light about py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                <div class="about-item-content bg-white rounded p-5 h-100">
                    <h4 class="text-primary">About Ticoz</h4>
                    <h1 class="display-4 mb-4">High Range of Exploring Protection</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt debitis sint tempora. Corporis consequatur illo blanditiis voluptates aperiam quos aliquam totam aliquid rem explicabo,
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae praesentium recusandae eligendi modi hic
                    </p>
                    <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>We can save your money.</p>
                    <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Production or trading of good</p>
                    <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Our life insurance is flexible</p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="https://api.whatsapp.com/send?phone=628122457443" target="_blank">More Information</a>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                <div class="about-item-content bg-white rounded p-5 h-100">      
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20753.867856650646!2d106.63307522003765!3d-6.218778035425588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fb20a9906e13%3A0xf75c5296d0a385e4!2sUniversitas%20Bina%20Nusantara%20(BINUS)%20Alam%20Sutera!5e0!3m2!1sid!2sid!4v1724859579811!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection