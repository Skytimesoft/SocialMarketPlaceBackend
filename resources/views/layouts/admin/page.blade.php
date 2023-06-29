<div class="page">
    {{-- Page Sidebar --}}
    @include('layouts.admin.sidebar')

    <div class="page-wrapper">
        <!-- Page header -->
        @include('layouts.admin.header')

        @yield('content')

    </div>
</div>
