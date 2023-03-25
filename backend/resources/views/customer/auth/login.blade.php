<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('customer/css/login.css') }}" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-4 text-center">
                <img src="https://book365.vn/bitrix/templates/book365-2021/images/edu-2021/login.png" class="img-banner"
                    alt="" />
            </div>
            <div class="col-sm-12 col-lg-8">
                <ul class="nav nav-pills mt-2" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-login-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login"
                            aria-selected="true">
                            Đăng nhập
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-register-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-register" type="button" role="tab"
                            aria-controls="pills-register" aria-selected="false">
                            Đăng ký tài khoản
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-forgot-password-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-forgot-password" type="button" role="tab"
                            aria-controls="pills-forgot-password" aria-selected="false">
                            Quên mật khẩu
                        </button>
                    </li>
                </ul>
                <hr />

                <div class="tab-content" id="pills-tabContent">
                    @if (session('msg'))
                        <div class="alert alert-danger text-center">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <form action="{{ route('post.login') }}" method="POST">
                        @csrf

                        <div class="tab-pane fade show active img-fluid" id="pills-login" role="tabpanel"
                            aria-labelledby="pills-login-tab" tabindex="0">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control" />

                                    @error('email')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Mật khẩu</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" />

                                    @error('password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <button type="submit" style="width: 100%; color: #fff" class="btn btn-warning">Đăng
                                        nhập</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/e8f8566497.js" crossorigin="anonymous"></script>

</html>
