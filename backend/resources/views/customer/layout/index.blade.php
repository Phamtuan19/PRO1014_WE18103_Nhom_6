<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('customer/css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/main.css') }}" />
    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>

    @include('customer.layout.header')
    @include('customer.homePage.index')
    @include('customer.layout.footer')


    <script src="{{ asset('customer/js/main.js') }}"></script>
    <script src="{{ asset('customer/js/service.js') }}"></script>
</body>

</html>
