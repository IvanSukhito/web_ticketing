@extends('layouts.frontend')

@section('head')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Dashboard</title>
    <!-- Bootstrap 4 CSS -->
   
    <style>
     /* body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: block;
            flex-direction: row;
        } */

        /* Sidebar styling */
        .user-sidebar {
            width: 250px;
            background-color: #0b3a6f;
            padding: 20px;
            height: 100vh;
            color: white;
        }

        .user-sidebar a {
            display: block;
            padding: 15px;
            color: white;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .user-sidebar a:hover {
            background-color: #1c579e;
            border-radius: 5px;
        }

        .user-sidebar a.active {
            background-color: #0067ff;
            border-radius: 5px;
        }

        /* Content area styling */
        .event-details-content
         {
            flex: 0;
            padding: 100px;
        }

        .card-details-content {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-details-content h2 {
            margin-bottom: 20px;
        }

        .card-details-content p {
            font-size: 18px;
        }

        .card-details-content .edit-profile {
            float: right;
            color: #0067ff;
            text-decoration: none;
        }

        .card-details-content .edit-profile:hover {
            text-decoration: underline;
        }

        /* Media queries for mobile responsiveness */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .user-sidebar {
                width: 100%;
                height: auto;
                display: flex;
                justify-content: space-around;
                padding: 10px;
                flex-wrap: wrap;
            }

            .user-sidebar a {
                padding: 10px;
                font-size: 16px;
                flex: 1 1 auto;
                text-align: center;
            }

            .event-details-content {
                padding: 20px;
            }

            .card-details-content {
                padding: 20px;
            }

            .card-details-content .edit-profile {
                float: none;
                display: block;
                text-align: center;
                margin-bottom: 20px;
            }
        }

        /* Media queries for very small devices */
        @media (max-width: 480px) {
            .user-sidebar a {
                font-size: 14px;
                padding: 8px;
            }

            .card-details-content p {
                font-size: 16px;
            }
        }
    
    </style>
 
@stop
@section('script-top')
@parent
<!-- Bootstrap 4 JS -->

@stop
@section('content')

<div class="container">
  <div class="row">
      <div class="col-lg-3">
          <div class="user-sidebar">
            <a href="#" class="active">Akun Saya</a>
            <a href="#">Tiket Saya</a>
            <a href="#">Pengaduan Tiket</a>
            <a href="#">Ubah Kata Sandi</a>
            <a href="#">Keluar</a>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="event-details-content">
          <div class="card-details-content">
              <h2>Informasi Akun</h2>
              <a href="#" class="edit-profile">Edit Profile</a>
              <hr>
              <p><strong>{{ Auth::user()->name }}</strong></p>
              <p>Email: {{ Auth::user()->email }}</p>
          </div>
      </div>
      </div>
  </div>
</div>

@endsection