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
    <link rel="stylesheet" href="{{ asset('customer/css/loading.css') }}" />
    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>

    @yield('link')

    <title>Document</title>
</head>

<body id="main">

    <div class="loading_1" id="loading_1"></div>
    <div class="content d-none">
        {{-- Header --}}
        @include('customer.layout.header')

        {{-- Content --}}
        <div class="layout__content">
            @yield('contents')
        </div>

        {{-- Footer --}}
        {{-- @dd(request()->path()) --}}
        @if (request()->path() == 'danh-sach-san-pham' ||
                request()->path() == 'trang-chu' ||
                request()->path() == 'bai-viet' ||
                request()->path() == 'chinh-sach-quy-dinh' ||
                request()->path() == 'shopping/cart')
            @include('customer.layout.footer')
        @endif
    </div>
    <div class="loading_2 d-none">

        {{-- Script Javacript --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
        <script type="module" src="{{ asset('customer/js/Layout/header/index.js') }}"></script>

        @yield('js')
</body>

</html>
