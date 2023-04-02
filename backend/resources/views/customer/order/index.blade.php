@extends('customer.layout.index')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('customer/css/shoppingCart.css') }}">
@endsection

@section('contents')
    @if (session('msg'))
        <div class="modal fade show modal-show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            style="display: block; top: -25px" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;">
                    <div class="modal-body mt-4" style="text-align: center">
                        <i class="fa-solid fa-circle-check" style="font-size: 50px; color: #1cc88a"></i>
                        <p class="mt-3" style="font-size: 18px; font-weight: 600">Đặt hàng thành công</p>
                    </div>
                    <button type="button" class="btn btn-primary mx-auto my-3 sucess-btn" data-bs-dismiss="modal">Về trang
                        chủ</button>
                </div>
            </div>
        </div>
    @endif

    <div class="container  mt-2 mb-4">
        <div class="row " style="background-color: #fff">

            <div class="col-12 pb-3">

                {{-- <form > --}}

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-5">
                            <h4 style="padding: 24px 0; text-align: center;">Thông tin khách hàng</h4>
                            <div class="container-fluid">
                                <div class="row">
                                    {{-- Name - userID --}}
                                    @if (Auth::guard('customers')->check('customers'))
                                        <div class="col-12 mb-3">
                                            <label for="" class="form-label"
                                                style="font-weight: 600; color: font-size: 16px">Tên khách hàng</label>
                                            <input type="text" class="form-control order_name" name="name"
                                                data-userId="{{ Auth::guard('customers')->user()->id }}"
                                                value="{{ old('name') ? old('name') : Auth::guard('customers')->user()->name }}"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                            @error('name')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- phone --}}
                                        <div class="col-6 mb-3">
                                            <label for="" class="form-label"
                                                style="font-weight: 600; color: font-size: 16px">Số điện thoại</label>
                                            <input type="text" class="form-control order_phone" name="phone"
                                                value="{{ old('phone') ? old('phone') : Auth::guard('customers')->user()->phone }}"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                            @error('phone')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- email --}}
                                        <div class="col-6 mb-3">
                                            <label for="" class="form-label"
                                                style="font-weight: 600; color: font-size: 16px">Email <small>(không bắt
                                                    buộc)</small></label>
                                            <input type="text" class="form-control order_email" name="email"
                                                value="{{ old('email') ? old('email') : Auth::guard('customers')->user()->email }}"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                            @error('email')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="col-12 mb-3">
                                            <label for="" class="form-label"
                                                style="font-weight: 600; color: font-size: 16px">Tên khách hàng</label>
                                            <input type="text" class="form-control order_name" name="name"
                                                data-userId="" value="{{ old('name') }}"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                            @error('name')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- phone --}}
                                        <div class="col-6 mb-3">
                                            <label for="" class="form-label"
                                                style="font-weight: 600; color: font-size: 16px">Số điện thoại</label>
                                            <input type="text" class="form-control order_phone" name="phone"
                                                value="{{ old('phone') }}"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                            @error('phone')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- email --}}
                                        <div class="col-6 mb-3">
                                            <label for="" class="form-label"
                                                style="font-weight: 600; color: font-size: 16px">Email <small>(không bắt
                                                    buộc)</small></label>
                                            <input type="text" class="form-control order_email" name="email"
                                                value="{{ old('email') }}"
                                                style="height: 46px; color: #86868B; font-size: 14px">
                                            @error('email')
                                                <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endif

                                    {{-- Thành phố --}}
                                    <div class="col-6 mb-4">
                                        <label for="" class="form-label" class="form-lable"
                                            style="font-weight: 600; color: font-size: 16px">Thành phố</label>
                                        <select class="form-select province" id="province" data-name=""
                                            aria-label="Default select example" name="province"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                            <option value="">--- Chọn Thành Phố ---</option>
                                        </select>
                                        @error('province')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- Quận / huyện --}}
                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label" class="form-lable"
                                            style="font-weight: 600; color: font-size: 16px">Quận / huyện</label>
                                        <select class="form-select" id="district" disabled="" value="nam sách"
                                            aria-label="Default select example" name="district"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                            <option value="">
                                                --- Chọn Quận huyện ---
                                            </option>
                                        </select>
                                        @error('district')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label" class="form-lable"
                                            style="font-weight: 600; color: font-size: 16px">Xã / phường</label>
                                        <select class="form-select" id="ward" disabled value="an lâm"
                                            aria-label="Default select example" name="ward"
                                            style="height: 46px; color: #86868B; font-size: 14px">
                                            <option value="">
                                                --- Chọn Xã Phường
                                            </option>
                                        </select>
                                        @error('ward')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="" class="form-label" class="form-lable"
                                            style="font-weight: 600; color: font-size: 16px">Thôn xóm / số nhà</label>
                                        <input type="text" name="house_number" class="form-control" id="house_number"
                                            value="{{ old('house_number') }}"
                                            style="height: 46px; color: #86868B; font-size: 14px; text-transform: capitalize;"
                                            disabled>
                                        @error('house_number')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="order_note" style="font-weight: 600; color: font-size: 16px">Ghi
                                            chú</label>
                                        <textarea class="form-control order_note" id="order_note" rows="3" name="note"
                                            placeholder="Thêm vào ghi chú của bạn ...">
                                                {{ old('note') }}
                                            </textarea>
                                        @error('note')
                                            <span class="text-danger" style="font-size: 16px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-7">
                            <div class="cart-detail">
                               
                                <h4 style="padding: 24px 0; text-align: center;">Thông tin sản phẩm</h4>
                                <table class="table">
                                    <thead>
                                        <tr style="font-size: 14px;">
                                            <th scope="col" width="100px">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá bán</th>
                                            <th scope="col">Giá sale</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart-table_body">
                                        {{-- Render javascript api + local --}}
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-between" style="flex: 1">
                                    <p class="total__money">Tổng Cộng:</p>
                                    <input type="text" class="total-payment" name="total_money" value="0"
                                        readonly>
                                </div>

                                <p class="mt-3" style="font-weight: 600; font-size: 16px">
                                    Hình thức giao hàng
                                </p>
                                <div class="form-check mt-1 d-flex align-items-center" style="vertical-align: inherit">
                                    <input class="form-check-input mx-2" type="radio" value="1" checked
                                        name="delivery_form" id="delivery_form">
                                    <label class="form-check-label" for="delivery_form"
                                        style="padding: 3px 0; background-color: #fff; font-size: 16px">
                                        Thanh toán khi nhận hàng
                                    </label>
                                </div>

                                <div class="form-check mt-1 d-flex align-items-center" style="vertical-align: inherit">
                                    <input class="form-check-input mx-2" type="radio" value="2"
                                        name="delivery_form" id="delivery_form">
                                    <label class="form-check-label" for="delivery_form"
                                        style="padding: 3px 0; background-color: #fff; font-size: 16px">
                                        Thanh toán khi nhận hàng
                                    </label>
                                </div>
                            </div>

                            <button type="submit" id="order" class="btn btn-primary mt-4 mx-auto"
                                style="width: 300px; height: 46px; line-height: 34px;">
                                Đặt hàng
                            </button>

                        </div>
                    </div>
                </div>

                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    {{-- <script type="module" src="{{ asset('customer/js/shoppingCart.js') }}"></script> --}}
    <script type="module" src="{{ asset('customer/js/order.js') }}"></script>
@endsection
