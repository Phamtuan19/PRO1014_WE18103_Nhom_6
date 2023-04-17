@extends('admin.layout.index')

@section('link_css')
    <style>

        .fa-repeat__box {
            position: absolute;
            top: 23px;
            right: 21px;
            padding: 15px;
            border-radius: 0 5px 5px 0;
            background: linear-gradient(to right, #da8cff, #9a55ff);
            cursor: pointer;
        }
    </style>
@endsection
@section('contents')
    <div class="content-wrapper">
        <div class="page-header">

            @if (session('msg'))
                <div class="alert alert-success text-center">
                    {{ session('msg') }}
                </div>
            @endif
        </div>
        <div class="page-header">
            <h3 class="page-title"> Thêm tác giả mới </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.author.index') }}" style="color: #0d6efd; font-weight: 600">Danh sách tác
                            giả</a>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.discountcode.update', $discountCode->id) }}" method="POST">
                        @method("PATCH")
                        @csrf

                        <div class="row">
                            <div class="col-6 form-group" style="position: relative">
                                <label for="discount_code">Mã phiếu giảm giá</label>
                                <input type="text" class="form-control form-control-lg" id="discount_code"
                                    placeholder="Mã phiếu giảm giá ..." name="discount_code"
                                    value="{{ $discountCode->discount_code }}">
                                <span class="fa-repeat__box" style="position: absolute"><i class="fa-solid fa-repeat"></i></span>
                                @error('discount_code')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6 form-group">
                                <label for="percentage_decrease">Số tiền giảm</label>
                                <input type="text" class="form-control form-control-lg" id="percentage_decrease"
                                    placeholder="Số tiền giảm ..." name="percentage_decrease"
                                    value="{{ $discountCode->percentage_decrease }}">

                                @error('percentage_decrease')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 form-group">
                                <label for="content">Nội dung mã giảm giá</label>
                                <input type="text" class="form-control form-control-lg" id="content"
                                    placeholder="Nội dung mã giảm ..." name="content" value="{{ $discountCode->content }}">

                                @error('content')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 form-group">
                                <label for="quantity">Số lượng</label>
                                <input type="text" class="form-control form-control-lg" id="quantity"
                                    placeholder="Số lượng mã giảm ..." name="quantity"
                                    value="{{ $discountCode->quantity }}">

                                @error('quantity')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6 form-group">
                                <label for="time_application">Thời gian áp dụng</label>
                                <input type="date" class="form-control form-control-lg" id="time_application"
                                    placeholder="Thời gian áp dụng ..." name="time_application"
                                    value="{{ $discountCode->time_application }}">

                                @error('time_application')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6 form-group">
                                <label for="expired">Thời gian hết hạn</label>
                                <input type="date" class="form-control form-control-lg" id="expired"
                                    placeholder="Thời gian hết hạn ..." name="expired"
                                    value="{{ $discountCode->expired }}">

                                @error('expired')
                                    <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function generateDiscountCode() {
            let length = 8;
            let chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let code = '';
            for (let i = 0; i < length; i++) {
                let randomIndex = Math.floor(Math.random() * chars.length);
                code += chars[randomIndex];
            }
            return code;
        }

        const repeat = document.querySelector(".fa-repeat__box")
        repeat.onclick = () => {
            document.querySelector("#discount_code").value = generateDiscountCode();
        }
    </script>
@endsection
