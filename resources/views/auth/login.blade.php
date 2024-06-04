@extends('layouts.auth')

@section('content')
<section class="hero">
        <img class= "background" src="{{ asset('img/auth/Background.png') }}" alt="background">
        <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="content">
            <h1>{{ __('Login') }}</h1>
            <div class="input-1">
                <label for="email" >{{ __('Email Address') }}</label>
               
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
               
            </div>
            <div class="input-1">
                <label for="password" >{{ __('password') }}</label>
             
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                
            </div>
      
            <div class="cta">
                <button class="pill">Log In</button>
                <div class="or">
                    <hr />
                    <p>atau masuk dengan</p>
                    <hr />
                </div>
                <div class="button-google">
                    <img src="{{ asset('img/auth/google.png') }}" alt="google">
                    <button class="pill2">Google</button>
                    <div>
                        
                    </div>
                </div>
                <p>Belum memiliki akun Ticoz? <a href="{{ route('register') }}" id="login">&nbsp;Daftar</a></p>
            </div>
        </div>
        </form>
    </section>
@endsection
