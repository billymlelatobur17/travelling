<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

</head>

<body>
<!--Navbar-->
@include('includes.navbar-alternate')

@yield('content')

<!--Footer-->
@stack('prepend-script')
@include('includes.script')
@stack('addon-script')
</body>
</html>
