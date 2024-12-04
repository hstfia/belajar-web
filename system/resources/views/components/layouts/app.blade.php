<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PANIC BUTTON</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link
    href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css"
    rel="stylesheet"
  />
    <link rel="stylesheet" href="{{ asset('public/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/tailwind.css') }}">
</head>

<body class="font-sans antialiased">

    <x-layouts.appbar />
    <x-layouts.sidebar />

   <section class="section-component">
    {{ $slot }}
   </section>



    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
   <script src="{{ asset('public/assets/js/jquery-3.7.1.js') }}"></script>
   <script src="{{ asset('public/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('public/assets/js/dataTables.js') }}"></script>
   <script src="{{ asset('public/assets/js/dataTables.bootstrap5.js') }}"></script>
   <script src="{{ asset('public/assets/js/app.js') }}"></script>

    @stack('js')
</body>
</html>
