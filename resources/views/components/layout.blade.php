<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Help2Help' }}</title>
    <!-- Styles -->
    @vite(['resources/scss/app.scss'])
</head>

<body>
    <x-header />
    {{ $slot }}
    <x-footer />
</body>

</html>
