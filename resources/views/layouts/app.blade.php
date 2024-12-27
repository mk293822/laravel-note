<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

        <!-- Page Content -->
        <main class="container mx-auto w-full py-8">
            @if (session('success'))
                <div class="alert z-20 alert-success mt-[-2rem] bg-green-500 absolutes w-full top-0 text-white p-4 rounded mb-4">
                {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert z-20 alert-danger mt-[-2rem] bg-red-500 absolutes w-full top-0 text-white p-4 rounded mb-4">
                {{ session('error') }}
                </div>
            @endif
            
            {{ $slot }}
        </main>
        </div>
    </body>
</html>
