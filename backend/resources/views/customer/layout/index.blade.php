<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('customer/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/main.css') }}" />
    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>

    @yield('link')

    <title>Document</title>
</head>

<body id="main">

    {{-- Header --}}
    @include('customer.layout.header')

    {{-- Content --}}
    @yield('contents')

    {{-- Footer --}}
    {{-- @dd(request()->path()) --}}
    {{-- @if (request()->path() !== 'shopping/cart' && request()->path() !== 'order')
        @include('customer.layout.footer')
    @endif --}}


    {{-- Script Javacript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <script type="module" src="{{ asset('customer/js/index.js') }}"></script>
    @yield('js')
</body>

</html>
