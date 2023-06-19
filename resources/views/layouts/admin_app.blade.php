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

    {{-- Default --}}
    @vite('resources/sass/app.scss')

    <!-- Custom styles for this Page-->
    @yield('custom_styles')

</head>
<body class="theme-light">
    <div class="page">
        {{-- Page Sidebar --}}
        @include('layouts.admin.sidebar')

        <div class="page-wrapper">
            <!-- Page header -->
            @include('layouts.admin.header')

            @yield('content')

        </div>
    </div>

    <!-- Core plugin JavaScript-->
    @vite('resources/js/app.js')

    <!-- Page level custom scripts -->
    @yield('custom_scripts')

</body>
</html>
