<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.meta')
</head>

<body class="fix-header fix-sidebar card-no-border">
    @include('layouts.preloader')

    <div id="main-wrapper">
        @include('layouts.header')
        @include('layouts.wrapper')
    </div>
</body>
</html>