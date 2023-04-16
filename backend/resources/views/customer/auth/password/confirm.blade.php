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
                        <h2 class="header">Comfirm Password</h2>
                    </div>

                    <div class="input-group" style="margin-top: 32px">
                        <label class="lable" for="password">Password</label>
                        <input type="password" id="password" class="password" name="password" value="admin1234"
                            placeholder="Type your password" />
                        <span class="error"></span>
                    </div>

                    <div class="input-group">
                        <label class="lable" for="password_comfirm">Comfirm Password</label>
                        <input type="password" id="password_comfirm" class="password_comfirm" name="password_comfirm" value="admin1234"
                            placeholder="Type your password" />
                        <span class="error"></span>
                    </div>

                    <button class="button">Xác nhận</button>

                </div>
            </div>
        </div>
        <div class="loading_2 d-none">
    </body>

    <script src="https://kit.fontawesome.com/03e43a0756.js" crossorigin="anonymous"></script>
    <script type="module" src="{{ asset('customer/js/Layout/Auth/password-comfirm/index.js') }}"></script>
</body>

</html>
