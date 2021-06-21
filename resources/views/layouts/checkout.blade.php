<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <title>@yield('title')</title>
    
    @include('includes.style')
    @stack('addOn-style')
</head>

<body>
    @include('includes.navbar-checkout')
    @yield('content')
    @include('includes.footer')

    @include('includes.script')
    @stack('addOn-script')
</body>

</html>