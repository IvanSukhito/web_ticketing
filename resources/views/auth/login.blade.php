@extends('layouts.auth')

@section('content')
<section class="hero">
        <img class= "background" src="{{ asset('img/auth/Background.png') }}" alt="background">
        <div class="content">
            <h1>Log In</h1>
            <div class="input-1">
                <h3>Phone number or email</h3>
                <input type="text">
            </div>
            <div class="input-1">
                <h3>Password</h3>
                <input type="password">
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
                <p>Belum memiliki akun Ticoz? <a href="SignUp.html" id="login">&nbsp;Daftar</a></p>
            </div>
        </div>
    </section>
@endsection
