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
        <div class="icon">
            <a href="" class="icon-tab"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-4 text-center">
                <img src="https://book365.vn/bitrix/templates/book365-2021/images/edu-2021/login.png" class="img-banner"
                    alt="" />
            </div>
            <div class="col-sm-12 col-lg-8">

                <div class="tab-content" id="pills-tabContent">
                    @if (session('msg'))
                        <div class="alert alert-danger text-center">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <!--  -->
                    <form action="{{ route('post.register') }}" method="POST">
                        @csrf

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label dp-flex">Họ và tên
                                <span class="ic-rq">(*)</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                                @error('name')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label dp-flex">
                                Địa chỉ Email
                                <span class="ic-rq">(*)</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label dp-flex">
                                SĐT (Số điện thoại)
                                <span class="ic-rq">(*)</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" />
                                @error('phone')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label dp-flex">
                                Mật khẩu
                                <span class="ic-rq">(*)</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="password" name="password" class="form-control" />
                                @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label dp-flex">
                                Nhập lại mật khẩu
                                <span class="ic-rq">(*)</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="password" name="password_confirmation" class="form-control" />
                                @error('password_confirmation')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info btn-register-acc">
                                    Đăng ký tài khoản
                                </button>
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
