<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Arráncalo') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts y estilos -->
        @include('partials.head')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#FCFCFF] text-[#1A1C1E]">
        <div class="min-h-screen flex flex-col">
            <!-- Navegación principal -->
            @include('layouts.navigation')

            <!-- Page Heading (opcional, solo si se pasa $header) -->
            @isset($header)
                <header class="bg-white shadow-md border-b border-[#74777A]/20">
                    <div class="max-w-7xl mx-auto py-8 px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Notificaciones Flash -->
            @include('partials.flash-messages')

            <!-- Contenido principal -->
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto px-6 py-12 lg:px-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>