<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AgroDirecto') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind (lo puedes dejar si ya lo tienes, o quitarlo si no lo usas) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" style="font-family: 'DM Sans', sans-serif;">

<div class="min-h-screen bg-[#f8f4ec]">

    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white border-b border-green-100 shadow-sm">
            <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3">
                    <div class="h-6 w-1 rounded-full bg-gradient-to-b from-green-500 to-yellow-400"></div>
                    <h2 class="text-lg font-semibold text-green-900">
                        {{ $header }}
                    </h2>
                </div>
            </div>
        </header>
    @endisset

    <!-- 🔥 IMPORTANTE: AQUÍ VA EL CONTENT (NO SLOT) -->
    <main>
        @yield('content')
    </main>

</div>

</body>
</html>