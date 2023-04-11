<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <div class="login-container">
                    <div class="" style="text-align: center">
                        <h2 class="header">Quên mật khẩu</h2>
                    </div>
                    <div class="input-group" style="margin-top: 32px;">
                        <label class="lable" for="email">Địa chỉ email</label>
                        <input type="text" class="form-control email" id="email" name="email"
                            placeholder="Nhập vào địa chỉ email ..." value="customer@gmail.com" />
                        <span class="error"></span>
                    </div>

                    <button class="button">Xác nhận</button>
                    <h3 class="forgotpass"><a href="./forgotpass.html">Đăng nhập</a></h3>
                    <h3 class="signup-header"><a href="{{ route('customer.register') }}">Đăng ký tài khoản</a></h3>

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
    <script type="module" src="{{ asset('customer/js/Layout/Auth/reset-password/index.js') }}"></script>
</body>

</html>
