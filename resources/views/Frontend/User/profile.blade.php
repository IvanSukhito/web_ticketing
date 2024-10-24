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
            background-color: #16243D;
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
                width: 100%;
              
              
            }

            .card-details-content {
                padding: 20px;
                width: 100%;
                justify-content: space-around;
                display: contents; 
                /* hapus aja display contents */
              
            }

            .card-details-content .edit-profile {
                width: 100%;
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

<div class="container" style="margin-left: 0; margin-right: 0;">
  
      <div class="col-lg-3">
          <div class="user-sidebar">
            
            <a href="{{ route('user.dashboard.index') }}" class="{{ $activeMenu == 'my-account' ? 'active' : ''}}">Akun Saya</a>
            <a href="#">Tiket Saya</a>
            <a href="#">Pengaduan Tiket</a>
            <a href="{{ route('user.dashboard.change-password') }}" class="{{ $activeMenu == 'change-password' ? 'active' : ''}}">Ubah Kata Sandi</a>
           
        </div>
      </div>
      <div class="col-lg-9">
        @if($activeMenu == "my-account")
        <div class="event-details-content">
            <div class="card-details-content">
                <h2>Informasi Akun</h2>
                <a href="#" class="edit-profile">Edit Profile</a>
                <hr>
                <p><strong>{{ Auth::user()->name }}</strong></p>
                <p>Email: {{ Auth::user()->email }}</p>
            </div>
          </div>
        @elseif ($activeMenu == "change-password")
        <div class="event-details-content">
            <div class="card-details-content">
                <h2>Change Password</h2>
                <form>
                    @csrf
                <div data-mdb-input-init class="form-outline mb-3">
                    <label for="form3Example4">Old Password</label>
                    <div style="position: relative;">
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        placeholder="Enter your old password" style="outline: 2px solid #f5f5f5;" required />
                      <span onclick="togglePasswordVisibility('password_confirmation')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                        <i class="fas fa-eye"></i>
                      </span>
                    </div>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-3">
                    <label for="form3Example4">Your Password</label>
                    <div style="position: relative;">
                      <input type="password" id="password" name="password" class="form-control"
                        placeholder="Enter your password" style="outline: 2px solid #f5f5f5;" required />
                      <span onclick="togglePasswordVisibility('password')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                        <i class="fas fa-eye"></i>
                      </span>
                    </div>
                  </div>
               
                <div data-mdb-input-init class="form-outline mb-3">
                    <label for="form3Example4">Your Confirm Password</label>
                    <div style="position: relative;">
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        placeholder="Enter your confirm password" style="outline: 2px solid #f5f5f5;" required />
                      <span onclick="togglePasswordVisibility('password_confirmation')" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                        <i class="fas fa-eye"></i>
                      </span>
                    </div>
                  </div>

                  <div>
                    <button type="submit" data-mdb-ripple-init class="btn btn-outline-primary"
                      style="padding-left: 2.5rem; padding-right: 2.5rem;">Save</button>
                      <button type="reset" data-mdb-ripple-init class="btn btn-outline-danger"
                      style="padding-left: 2.5rem; padding-right: 2.5rem;">Cancel</button>
        
                   
                  </div>
                </form>
            </div>
          </div>
        @endif
      </div>

</div>

@endsection
@section('script-top')
@parent
<script>
  function togglePasswordVisibility(inputId) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
      input.type = "text"; // Show password
    } else {
      input.type = "password"; // Hide password
    }
  }
</script>
@stop