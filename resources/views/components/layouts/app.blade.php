<!doctype html>
<html lang="{{ $lang }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Styles -->
        <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <main>
            <x-layouts.app.header />

            <div class="container mt-5 mb-5">
                {{ $slot }}
            </div>
        </main>

        <!--Scripts -->
        <script src="{{ mix('assets/js/app.js') }}"></script>
    </body>
</html>
