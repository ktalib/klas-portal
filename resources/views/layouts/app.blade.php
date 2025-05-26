<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KANGIS') }} - @yield('title', 'Kano State Geographic Information System')</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Official portal for Kano State Geographic Information System (KANGIS). Access land information, GIS data, and related services.">
    <meta name="keywords" content="KANGIS, Kano State, Geographic Information System, GIS, Land Information, Kano State Government">
    <meta name="author" content="KANGIS">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ config('app.name', 'KANGIS') }} - @yield('title', 'Kano State Geographic Information System')">
    <meta property="og:description" content="Official portal for Kano State Geographic Information System (KANGIS). Access land information, GIS data, and related services.">
    <meta property="og:image" content="https://i.ibb.co/p6fGzp43/Whats-App-Image-2025-02-28-at-4-01-36-PM.jpg">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name', 'KANGIS') }} - @yield('title', 'Kano State Geographic Information System')">
    <meta name="twitter:description" content="Official portal for Kano State Geographic Information System (KANGIS). Access land information, GIS data, and related services.">
    <meta name="twitter:image" content="https://i.ibb.co/p6fGzp43/Whats-App-Image-2025-02-28-at-4-01-36-PM.jpg">

    <!-- Favicon -->
    <link rel="icon" href="http://localhost/klas-portal/public/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="http://localhost/klas-portal/public/favicon.ico" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Flash Messages -->
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: @json(session('success')),
                confirmButtonColor: '#10B981'
            })
        </script>
    @endif
    
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: @json(session('error')),
                confirmButtonColor: '#EF4444'
            })
        </script>
    @endif
    
    

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>

