<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Wiljantoro Mukti</title>

    @livewireStyles

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cta.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- jQuery & Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    @yield('css')
    {{-- @vite('resources/js/app.js') --}}
</head>

<body class="">

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Content -->
    <main>
        @yield('content')
    </main>
    {{-- CTA Section --}}
    @include('layouts.cta')
    <!-- Footer -->
    @include('layouts.footer')
    @yield('js')
    @livewireScripts
</body>

</html>