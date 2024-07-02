@extends('layouts.auth')

@section('content')
<section class="hero">
        <img class= "background" src="{{ asset('img/auth/Background.png') }}" alt="background">
        <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="content">
            <h1>Sign Up</h1>
            <div class="input-1">
            <label for="name" >{{ __('Nama') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
            </div>
            <div class="input-1">
            <label for="email" >{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
               
            </div>
            <div class="input-1">
            <label for="password" >{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            </div>
            <div class="input-1">
            <label for="email" >{{ __('Confrim Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">                            
            </div>
         
            <div class="cta">
                <button class="pill">Sign Up</button>
                <div class="or">
                    <hr />
                    <p>atau daftar dengan</p>
                    <hr />
                </div>
                <a href="{{ route('google-auth') }}"  class="button pill2">
                <div class="button-google">
                    <img src="{{ asset('img/auth/google.png') }}" alt="google"> 
                    
                    <div style="align-item: center;">Google</div>
                   
                </div>
                </a>
                <p>Sudah memiliki akun Ticoz? <a href="{{ route('login') }}" id="login">&nbsp;Masuk</a></p>
            </div>
        </div>
        </form>
    </section>
@endsection
