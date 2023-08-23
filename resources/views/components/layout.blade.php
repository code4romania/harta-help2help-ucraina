<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Help2Help' }}</title>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative min-h-screen p-0 m-0 pb-60 md:pb-72 lg:pb-80 bg-slate-50">
    <x-header />

    {{ $slot }}

    <x-footer />
</body>

$@stack('js')

@production
    <x-analytics :id="config('services.google.analytics')" />
@endproduction

</html>
