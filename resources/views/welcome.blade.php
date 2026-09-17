<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroDirecto 2026</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="relative min-h-screen flex items-center justify-center">
        
        <div class="fixed inset-0 z-[-1] bg-gradient-to-br from-green-900 via-green-800 to-black"></div>

        <main class="w-full max-w-lg px-6">
            <div class="bg-white p-8 md:p-12 rounded-3xl shadow-2xl text-center">
                
                <div class="inline-block px-3 py-1 bg-green-100 text-green-700 text-xs font-bold uppercase rounded-full mb-4">
                        BIENVENIDO A 
                </div>
                
                <h1 class="text-4xl font-bold text-gray-900 mb-8">
                    AgroDirecto <span class="text-green-600">2026</span>
                </h1>

                <div class="flex flex-col gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="w-full py-3 bg-green-700 text-white rounded-xl font-semibold hover:bg-green-600 transition shadow-md">
                                Ir al Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="w-full py-3 bg-green-700 text-white rounded-xl font-semibold hover:bg-green-600 transition shadow-md">
                                Iniciar Sesión
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="w-full py-3 bg-gray-50 text-gray-700 border border-gray-200 rounded-xl font-semibold hover:bg-gray-100 transition">
                                    Registrarse
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </main>
    </div>
</body>
</html>