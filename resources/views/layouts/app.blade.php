<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle ?? config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main>
        @include('layouts._partials.header')
        <div class="container mt-5 mb-5">
            @yield('content')
        </div>
    </main>

    <!--Scripts -->
    <script src="{{ mix('assets/js/app.js') }}"></script>
</body>
</html>
