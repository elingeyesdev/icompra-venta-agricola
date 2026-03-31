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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#f8f4ec] min-h-screen">

    <div class="min-h-screen flex">

        {{-- ===== PANEL IZQUIERDO ===== --}}
        <div class="hidden lg:flex lg:w-[44%] relative flex-col items-center justify-center px-12 py-16 overflow-hidden"
             style="background: linear-gradient(155deg, #1a3d2b 0%, #2d6a4f 55%, #52b788 100%);">

            {{-- Patrón de fondo --}}
            <div class="absolute inset-0 opacity-50"
     style="background-image: url('{{ asset('fondo_verdeOscuro.jpg') }}');
            background-size: 70px 70px;">
</div>
            
            {{-- Logo --}}
            <div class="relative z-10 text-center mb-10">
    <div class="w-20 h-20 flex items-center justify-center mx-auto mb-5">
        <img src="{{ asset('logo_fondo_oscuro.png') }}" 
             class="w-20 h-20 rounded-full object-cover">
    </div>

    <h1 class="text-5xl font-bold leading-tight text-white" style="font-family: 'Playfair Display', serif;">
        Agro<br>Directo
    </h1>
</div>

            {{-- Chips de productos --}}
            <div class="relative z-10 flex flex-wrap justify-center gap-2 max-w-xs mb-10">
                @foreach([' Papa', ' Cebolla', ' Zanahoria', ' Maíz', ' Tomate'] as $producto)
                    <span class="px-3 py-1.5 rounded-full text-xs font-medium text-white/90"
                          style="background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);">
                        {{ $producto }}
                    </span>
                @endforeach
            </div>

            {{-- Frase --}}
            <div class="relative z-10 text-center max-w-[260px]">
                <span class="block mt-3 text-[11px] tracking-[2px] uppercase" style="color: #b7e4c7;">
                    Plataforma Agrícola
                </span>
            </div>

        </div>

        {{-- ===== PANEL DERECHO (formulario) ===== --}}
        <div class="flex-1 flex flex-col items-center justify-center px-6 py-12 sm:px-12">

            {{-- Logo móvil (solo visible en pantallas pequeñas) --}}
            <div class="lg:hidden text-center mb-8">
                <div class="w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-3 text-2xl"
                     style="background: #1a3d2b;">
                    
                </div>
                <h2 class="text-2xl font-bold text-green-900" style="font-family: 'Playfair Display', serif;">
                    AgroDirecto
                </h2>
            </div>

            {{-- Tarjeta del formulario --}}
           <div class="w-full max-w-md bg-green-100 rounded-2xl shadow-lg border border-green-800 px-8 py-10">
                {{-- Encabezado dinámico según la ruta --}}
                <div class="mb-7">
                    @php
                        $routeName = request()->route()?->getName() ?? '';
                        $titulos = [
                            'login'             => ['Bienvenido de vuelta',     'Ingresa a tu cuenta para continuar'],
                            'register'          => ['Crear cuenta',             'Únete a la comunidad AgroDirecto'],
                            'password.request'  => ['Recuperar contraseña',     'Te enviaremos un enlace a tu correo'],
                            'password.reset'    => ['Nueva contraseña',         'Establece una contraseña segura'],
                            'verification.notice' => ['Verifica tu correo',     'Revisa tu bandeja de entrada'],
                            'password.confirm'  => ['Confirmar contraseña',     'Zona segura — verifica tu identidad'],
                        ];
                        $titulo    = $titulos[$routeName][0] ?? 'AgroDirecto';
                        $subtitulo = $titulos[$routeName][1] ?? '';
                    @endphp

                    <h2 class="text-2xl font-bold text-green-900 leading-tight" style="font-family: 'Playfair Display', serif;">
                        {{ $titulo }}
                    </h2>
                    {{-- Línea decorativa --}}
                    <div class="mt-2 mb-3 h-[3px] w-10 rounded-full"
                         style="background: linear-gradient(90deg, #52b788, #e9c46a);">
                    </div>
                    @if($subtitulo)
                        <p class="text-sm text-gray-500">{{ $subtitulo }}</p>
                    @endif
                </div>

                {{-- SLOT: contenido del formulario --}}
                {{ $slot }}

            </div>

        </div>

    </div>

</body>
</html>