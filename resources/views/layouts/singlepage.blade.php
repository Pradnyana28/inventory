<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.meta')
</head>

<body class="single-page-bg">
    @include('layouts.preloader')

    <div id="main-wrapper">
        @include('layouts.header')
        @yield('content')
    </div>
</body>
</html>

<!-- All Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/single-page.js') }}"></script>