<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Template styles --}}
    @vite('public/dist/css/tabler.min.css')
    @vite('public/dist/css/tabler-flags.min.css')
    @vite('public/dist/css/tabler-payments.min.css')
    @vite('public/dist/css/tabler-vendors.min.css')
    @vite('public/dist/css/demo.min.css')
    @vite('public/dist/css/admin-template.css')

    {{-- Core styles --}}
    @vite('resources/sass/app.scss')
    @livewireStyles

    <!-- Custom styles for this Page-->
    @yield('custom_styles')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body class="theme-light">
    <div class="page">
        {{-- Page Sidebar --}}
        @include('layouts.admin.sidebar')

        <div class="page-wrapper">
            <!-- Page header -->
            @include('layouts.admin.header')

            {{ $slot }}

        </div>
    </div>

    <!-- Core plugin JavaScript-->
    @vite('resources/js/app.js')

    @livewireScripts
    <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
    </script>
    @vite('public/dist/js/livewire-turbolinks.js')

    <!-- Page level custom scripts -->
    @yield('custom_scripts')
</body>
</html>
