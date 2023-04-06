<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('customer/css/auth/login.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/base.css') }}" />
    <title>Document</title>
</head>

<body>

    <body>
        <div id="toast"></div>
        <div class="fullscreen-container">
            <div class="login-container">
                {{-- <h1>Tên Trang bán hàng</h1> --}}
                <div class="" style="text-align: center">
                    <h2 class="header">Đăng Nhập </h2>
                </div>
                {{-- <form class="form"> --}}
                <div class="input-group">
                    <label class="lable" for="email">Email</label>
                    <input type="text" class="form-control email" id="email" name="email"
                        placeholder="Type your email" value="customer@gmail.com" />
                    <span class="error"></span>
                </div>
                <div class="input-group">
                    <label class="lable" for="password">Password</label>
                    <input type="password" id="password" class="password" name="password" value="admin1234"
                        placeholder="Type your password" />
                    <span class="error"></span>
                </div>

                <button class="button">Đăng nhập</button>
                {{-- </form> --}}
                <h3 class="forgotpass"><a href="./forgotpass.html">Quên mật khẩu</a></h3>
                <h3 class="signup-header"><a href="./register.html">Đăng ký tài khoản</a></h3>

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
    </body>

    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>
    <script type="module" src="{{ asset('customer/js/Layout/Auth/login.js') }}"></script>
</body>

</html>
