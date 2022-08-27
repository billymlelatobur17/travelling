<!DOCTYPE HTML>
<!--
Template Name: Icewall - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="{{asset('backend/dist/images/logo.svg')}}" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>TRAVELRIA ADMIN</title>
    <!-- BEGIN: CSS -->
    @include('includes.admin.style')
    <!-- END: CSS -->
</head>
<!-- END: Head -->
<body class="main">
<!-- BEGIN: Mobile Menu -->
@include('includes.admin.mobile-menu')
<!-- END: Mobile Menu -->
<!-- BEGIN: Top Bar -->
@include('includes.admin.navbar')
<!-- END: Top Bar -->
<div class="wrapper">
    <div class="wrapper-box">
        <!-- BEGIN: Side Menu -->
        @include('includes.admin.sidebar')
        <!-- END: Side Menu -->
        <!-- BEGIN CONTENT -->
        @yield('content')
        <!-- END CONTENT -->
    </div>
</div>

<!-- BEGIN: JS Assets-->
@include('includes.admin.script')
<!-- END: JS Assets-->
</body>
</html>
