<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(App::environment('production'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-R0RSRB4PSE"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-R0RSRB4PSE');
        </script>
    @endif
    <title>{{ $title ?? 'Help2Help' }}</title>
    <!-- Styles -->
    @vite(['resources/scss/app.scss'])
</head>

<body>
    <x-header />
    {{ $slot }}
    <x-footer />
</body>
@vite('resources/js/app.js')
{{$js ?? ''}}

</html>
