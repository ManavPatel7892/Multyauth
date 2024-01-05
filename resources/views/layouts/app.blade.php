<!doctype html>
<html lang="en">

<head>
<title>Mooli | Home</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Mooli Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/animate-css/vivify.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/c3/c3.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css') }}">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/mooli.min.css') }}">

</head>
<body>

@include('layouts.header')
@include('layouts.sidebar')
@yield('main-section')

@include('layouts.footer')
{{-- @yield('page-script') --}}
