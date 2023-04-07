<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('customer/css/auth/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/loading.css') }}" />
    <title>Document</title>
</head>

<body>

    <body>
        <div class="loading_1">
        </div>
        <div class="content d-none">
            <div id="toast"></div>
            <div class="fullscreen-container">
                <div class="login-container" style="width: auto; padding: 25px 25px 20px;">
                    <div class="" style="text-align: center">
                        <h2 class="header">Đăng ký tài khoản mới </h2>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 input-group">
                                <label class="lable" for="name">Tên tài khoản</label>
                                <input type="text" class="form-control name" id="name" name="name"
                                    placeholder="Nhập vào tên tài khoản" value="customer" style="width: 100%;" />
                                <span class="error"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 input-group">
                                <label class="lable" for="email">Địa chỉ email</label>
                                <input type="text" class="form-control email" id="email" name="email"
                                    placeholder="Nhập vào địa chỉ Email ..." value="customer@gmail.com"
                                    style="width: 100%;" />
                                <span class="error errorEmail"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 input-group">
                                <label class="lable" for="phone">Số điện thoại</label>
                                <input type="text" id="phone" class="phone" name="phone" value="0971894323"
                                    placeholder="Nhập số điện thoại..." />
                                <span class="error errorPhone"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 input-group">
                                <label class="lable" for="password">Mật khẩu</label>
                                <input type="password" id="password" class="password" name="password" value="admin1234"
                                    placeholder="Nhập vào mật khẩu ..." />
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>

                    <button class="button">Đăng nhập</button>
                    <h3 class="signup-header"><a href="{{ route('customer.login') }}">Đăng nhập</a></h3>
                    <h3 class="forgotpass"><a href="./forgotpass.html">Quên mật khẩu</a></h3>

                    <div class="social-icons">
                        <ul class="social-list">
                            <li class="social-links">
                                <a href=""><i class="fa-brands fa-facebook"></i></a>
                            </li>
                            <li class="social-links">
                                <a href=""><i class="fa-brands fa-twitter"></i></a>
                            </li>
                            <li class="social-links">
                                <a href=""><i class="fa-brands fa-google"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="loading_2 d-none">
    </body>

    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>
    <script type="module" src="{{ asset('customer/js/Layout/Auth/register/index.js') }}"></script>
</body>

</html>
