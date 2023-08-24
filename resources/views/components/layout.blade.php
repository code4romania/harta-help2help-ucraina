<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-slate-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Help2Help' }}</title>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen antialiased">
    <x-header />

    <main class="flex-1">
        {{ $slot }}
    </main>

    <x-footer />
</body>

@stack('js')

@production
    <x-analytics :id="config('services.google.analytics')" />
@endproduction

</html>
