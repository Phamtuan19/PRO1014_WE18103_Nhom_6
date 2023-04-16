<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./emailPass.css" />
    <title>Document</title>

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            padding: 0;
        }

        body {
            margin: 0;
            font-family: "Open Sans", sans-serif;
        }

        .fullscreen-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100vw;
            background: #d7dde6;

        }

        .form-mail {
            width: 50%;
            max-width: 500px;
            min-width: 300px;
            padding: 15px;
            background: white;
            border-radius: 2px;
        }

        .form-mail h2 {
            font-size: 28px;
        }

        .form-mail p {
            font-size: 16px;
            color: rgb(40, 47, 54);
            padding: 5px 0;
        }

        .form-mail a {
            font-size: 16px;
            color: #fff;
            border-radius: 4px;
            padding: 10px 15px;
            text-decoration: none;

            background-color: #373e47;
        }

        .btn-pass {
            text-align: center;
            margin: 45px 0;
        }
    </style>

</head>

<body>

    <body>
        <div class="fullscreen-container">
            <div class="form-mail">
                <h2 class="header">Hello!</h2>
                <p>You are receiving this email because we received a password reset request for your account.</p>
                <div class="btn-pass"><a href="{{ route('verify.password', $data) }}">Reset Password</a></div>
                <p>This password reset link will expire in 60 minutes.</p>
                <p>If you did not request a password reset, no further action is required.</p>
                <p>Sincerely thank you.</p>
                <hr>
                <p style="text-align: center; font-size: 14px;">© 2023 Book365. All rights reserved.</p>

            </div>
        </div>
    </body>
</body>

</html>
