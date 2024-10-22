@extends('layouts.auth')

@section('head')
    @parent
    <style>
/* Styles for Register form - Reuse existing CSS */

/* Perubahan untuk menambahkan padding agar nyaman */
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif; /* Menggunakan font modern */
  background: linear-gradient(135deg, #4c83ff, #3d5e95);
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
}

.login-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}

.login-box {
  background-color: #fff;
  padding: 50px 40px;
  border-radius: 15px; /* Membulatkan sudut form */
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Bayangan lembut */
  text-align: center;
  max-width: 400px;
  width: 100%;
  transition: transform 0.3s ease; /* Menambahkan transisi */
}

.login-box:hover {
  transform: scale(1.05); /* Efek zoom saat di-hover */
}

h2 {
  margin-bottom: 20px;
  color: #333;
  font-size: 28px; /* Membuat teks judul lebih besar */
}

.input-group {
  position: relative;
  margin-bottom: 35px;
}

.input-group input {
  width: 100%;
  padding: 15px 15px 15px 40px; /* Padding lebih besar */
  font-size: 16px;
  border: 2px solid #ddd;
  border-radius: 30px; /* Membulatkan input */
  outline: none;
  transition: border-color 0.3s, box-shadow 0.3s; /* Menambahkan transisi */
}

.input-group input:focus {
  border-color: #4c83ff;
  box-shadow: 0 0 8px rgba(76, 131, 255, 0.5); /* Efek fokus */
}

.input-group label {
  position: absolute;
  left: 40px;
  top: 50%;
  transform: translateY(-50%);
  color: #aaa;
  font-size: 16px;
  pointer-events: none;
  transition: 0.3s;
}

.input-group input:focus ~ label,
.input-group input:valid ~ label {
  top: -10px;
  left: 35px;
  font-size: 12px;
  background-color: #fff;
  padding: 0 5px;
  color: #4c83ff;
}

.login-btn {
  width: 100%;
  padding: 15px;
  background-color: #4c83ff;
  border: none;
  color: #fff;
  font-size: 16px;
  border-radius: 30px; /* Membulatkan tombol */
  cursor: pointer;
  transition: background-color 0.3s, transform 0.3s;
}

.login-btn:hover {
  background-color: #3d5e95;
  transform: translateY(-3px); /* Efek hover mengangkat tombol */
  box-shadow: 0 6px 15px rgba(61, 94, 149, 0.4); /* Efek bayangan */
}

.signup-link {
  margin-top: 20px;
  font-size: 14px;
}

.signup-link a {
  color: #4c83ff;
  text-decoration: none;
  font-weight: bold;
  transition: color 0.3s; /* Menambahkan transisi */
}

.signup-link a:hover {
  color: #3d5e95;
  text-decoration: underline;
}

/* Media Query for Mobile */
@media (max-width: 600px) {
  .login-box {
    padding: 30px 20px; /* Mengurangi padding pada mobile */
  }

  h2 {
    font-size: 24px;
  }

  .input-group input {
    font-size: 14px;
    padding: 12px 12px 12px 35px;
  }

  .input-group label {
    font-size: 14px;
    left: 35px;
  }

  .login-btn {
    font-size: 14px;
  }

  .signup-link {
    font-size: 12px;
  }
}


.input-group input {
  width: 100%;
  padding: 15px 15px 15px 40px; /* Menyesuaikan dengan padding input yang lebih besar */
  font-size: 16px;
  border: 2px solid #ddd;
  border-radius: 30px;
  outline: none;
  transition: border-color 0.3s, box-shadow 0.3s;
}

.input-group input:focus {
  border-color: #4c83ff;
  box-shadow: 0 0 8px rgba(76, 131, 255, 0.5);
}

.input-group label {
  position: absolute;
  left: 40px;
  top: 50%;
  transform: translateY(-50%);
  color: #aaa;
  font-size: 16px;
  pointer-events: none;
  transition: 0.3s;
}

.input-group input:focus ~ label,
.input-group input:valid ~ label {
  top: -10px;
  left: 35px;
  font-size: 12px;
  background-color: #fff;
  padding: 0 5px;
  color: #4c83ff;
}

/* Tidak ada perubahan besar lainnya diperlukan */

    </style>    
@stop
@section('content')

            
 
<div class="login-container">
    <div class="login-box">
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" id="autoDismissAlert" role="alert" style="max-width: 400px; margin: 0 auto; margin-right: 200px; font-size: 0.9rem;">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          
      <h2>{{ _('Sign Up') }}</h2>
      
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group">
          <input type="text" name="name" required>
          <label>Name</label>
        </div>
        <div class="input-group">
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-group">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="input-group">
          <input type="password" name="password_confirmation" required>
          <label>Confirm Password</label>
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
      </form>
    </div>
  </div>
@endsection
