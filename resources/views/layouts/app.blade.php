<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Zonera - Ruang Belajar Virtual')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/isometric.css') }}">
    @stack('styles')
</head>
<body>
    <div class="container-app">
        @include('components.navigation')
        
        <main class="main-content">
            @yield('content')
        </main>

        @include('components.footer')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
