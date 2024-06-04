<!DOCTYPE html>
<html lang="en">
<head>
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
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/auth/logo.png') }}" alt="Logo">
            <h1>Ticoz</h1>
        </div>
    </header>

    @yield('content')
    <script>
        feather.replace();
      </script>

</body>
</html>