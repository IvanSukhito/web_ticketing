@extends('layouts.auth')

@section('content')
<section class="hero">
        <img class= "background" src="{{ asset('img/auth/Background.png') }}" alt="background">
        <div class="content">
            <h1>Sign Up</h1>
            <div class="input-1">
                <h3>Name</h3>
                <input type="text">
            </div>
            <div class="input-1">
                <h3>Email Address</h3>
                <input type="text">
            </div>
            <div class="input-1">
                <h3>Password</h3>
                <input type="text">
            </div>
            <div class="input-1">
                <h3>Confirm Password</h3>
                <input type="text">
            </div>
         
            <div class="cta">
                <button class="pill">Sign Up</button>
                <div class="or">
                    <hr />
                    <p>atau daftar dengan</p>
                    <hr />
                </div>
                <div class="button-google">
                    <img src="{{ asset('img/auth/google.png') }}" alt="google">
                    <button class="pill2">Google</button>
                    <div>
                        
                    </div>
                </div>
                <p>Sudah memiliki akun Ticoz? <a href="Login.html" id="login">&nbsp;Masuk</a></p>
            </div>
        </div>
    </section>
@endsection
