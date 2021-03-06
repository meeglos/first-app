<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <!-- CSRF Token --> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <!-- Styles --> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-brand-lightest h-screen">
    <div id="app" class="bg-grey-lightest font-nunito px-5">
        @include('partials.header')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/b5ab651074.js"></script>
</body>
</html>
