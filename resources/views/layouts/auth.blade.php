<!DOCTYPE html>
<html lang="en">
    
<head>
    <style>
        @media (max-width: 768px) {
          .alert {
            margin-right: 0 !important; /* Menghilangkan margin kiri di perangkat mobile */
            width: auto;
          }
        }
      </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticoz</title>
    <link href="{{ asset('css/frontend/auth.css') }}" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- Icon -->
    <script src="https://unpkg.com/feather-icons"></script>
      <!-- Scripts -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <header>
        <div class="logo">
        <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('img/ticoz.png') }}" alt="Logo">
                <h1>Ticoz</h1>
            </a>
        </div>
    </header>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show"  id="autoDismissAlert"  role="alert" style="max-width: 400px; margin: 0 auto; margin-right: 200px; font-size: 0.9rem;">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>    
    @endif
    
      
    @yield('content')
    <script>
        feather.replace();
        setTimeout(function() {
        $('#autoDismissAlert').alert('close');
        }, 5000);
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    

</body>
</html>