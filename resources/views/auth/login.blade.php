@extends('layouts.auth')

@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
   
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        @if(session("success"))
        <div class="alert alert-success alert-dismissible fade show" id="autoDismissAlert" role="alert" >
          <strong>Success!</strong> {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        
    
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Welcome</p>
           
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Login</p>
          </div>

          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <label for="form3Example3">Email address</label>
            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" style="outline: 2px solid #f5f5f5;" required/>
           
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-3">
            
            <label for="form3Example4">Password</label>
            <input type="password" name="password"  class="form-control form-control-lg"
              placeholder="Enter password"  style="outline: 2px solid #f5f5f5;" required/>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" required />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

              <a  href="{{ route('google-auth') }}" data-mdb-a-init data-mdb-ripple-init class="btn btn-light " style="margin-left: 10px;">
                <img src="{{ asset('img/auth/google.png') }}" alt="google"> 
                   Google
              </a>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2024. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      {{-- <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a> --}}
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      {{-- <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a> --}}
    </div>
    <!-- Right -->
  </div>
</section>
    
@endsection
