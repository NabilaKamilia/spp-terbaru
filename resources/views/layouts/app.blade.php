<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MI AL-HUDA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body>

    @include('includes.navbar')

    @yield('content')
    {{-- @inject('convert', 'Convert') --}}
    @include('includes.footer')

    @stack('prepend-script')
    @include('includes.script')
    @yield('script')
    @stack('addon-script')

</body>

</html>
