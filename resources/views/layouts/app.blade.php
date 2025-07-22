<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Classements Extrêmes') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased min-h-screen bg-gradient-to-br from-blue-50 via-blue-100 to-violet-100 text-gray-900">
        <div class="min-h-screen flex flex-col">
            <header class="sticky top-0 z-30 w-full bg-white/80 backdrop-blur shadow-md">
                @include('layouts.navigation')
            </header>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white/80 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                @yield('content')
            </main>
            <footer class="bg-gray-900 border-t mt-8 py-6 text-center text-sm text-gray-200 shadow-inner">
                <div class="flex flex-col items-center gap-2">
                    <span class="font-bold tracking-widest text-lg">Classements Extrêmes</span>
                    <span>&copy; {{ date('Y') }} Tous droits réservés.</span>
                    <span class="text-xs text-gray-400">Projet Laravel - DA by AI</span>
                </div>
            </footer>
        </div>
    </body>
</html>
