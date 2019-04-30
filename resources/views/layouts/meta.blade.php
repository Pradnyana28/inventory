<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="title" content="@yield('page-title')">
<meta name="description" content="@yield('page-description')">
<meta name="author" content="@yield('page-author')">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
<title>@yield('page-title') | {{ config('app.name', 'Simple Inventory') }}</title>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{-- Datatable core css --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<!-- Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('css/vendor/jquery.toast.css') }}" rel="stylesheet">
@yield('custom-css')
<!-- Scripts -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
    .page-wrapper .container-fluid:first-child{
        padding-bottom: 60px;
    }

    @media  screen and (max-width: 768px) {
        .page-wrapper .container-fluid:first-child{
            padding-bottom: 90px;
        }
    }
</style>