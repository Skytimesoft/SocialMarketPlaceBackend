<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
    $tinyAPI = 'x6n0kjoezjwiuijiwf6apus1qjlj7mkalr87v5lbxy6ma0fi';
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Template styles --}}
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler-flags.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler-payments.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler-vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/admin-template.css') }}">
    @stack('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body class="theme-light">
    <div class="page">
        {{-- Page Sidebar --}}
        @include('layouts.admin.sidebar')

        <div class="page-wrapper">
            <!-- Page header -->
            @include('layouts.admin.header')

            <div class="container-fluid mt-4">
                @yield('content')
            </div>

        </div>
    </div>
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    @stack('js')
</body>

</html>
