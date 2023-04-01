<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    @if (request()->path() !== 'shopping/cart' && request()->path() !== 'order')
        @include('customer.layout.footer')
    @endif


    {{-- Script Javacript --}}
    <script type="module" src="{{ asset('customer/js/homePage.js') }}"></script>
    @yield('js')
</body>

</html>
