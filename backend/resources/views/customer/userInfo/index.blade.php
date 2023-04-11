@extends('customer.layout.index')
@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/user__info.css') }}">
@endsection
@section('contents')
    <div class="container mt-3" style="background: #FFF">
        <div class="row" style="padding-bottom: 24px;">
            <div class="col-12">
                <div class="user__action">
                    <button class="btn user__action__profile active">
                        Edit Profile
                    </button>
                    <button class="btn user__action__password">
                        Edit Password
                    </button>
                    <button class="btn user__action__order">
                        Order
                    </button>
                </div>
            </div>
            <div class="col-12 user__title"></div>
            <div class="col-4">
                <div class="user__info">
                    <div class="user__image"
                        style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6-mjGqaXm3jXTGjccbMgnx1eoTNpZlja_FQ&usqp=CAU)">
                    </div>
                    <h4 class="user__full__name">Phạm anh tuấn</h4>
                </div>
            </div>
            <div class="col-8">
                <div class="container-fluid container_edit__profile">
                    <div class="row edit-profile">
                        <div class="col-6 mt-3">
                            <div class="mb-3">
                                <label for="user_name" class="form-label">Tên người dùng</label>
                                <input type="text" class="form-control from-custom user_name" id="user_name"
                                    placeholder="Tên người dùng ...">
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <div class="mb-3">
                                <label for="province" class="form-label">Tỉnh / Thành phố</label>
                                <select class="form-select from-custom user_province" id="province"
                                    aria-label="Default select example">
                                    <option>Chọn Tỉnh - Thành phố</option>
                                </select>
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <div class="mb-3">
                                <label for="user_phone" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control from-custom user_phone" id="user_phone"
                                    placeholder="Số điện thoại người dùng ...">
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <div class="mb-3">
                                <label for="district" class="form-label">Quận / Huyện</label>
                                <select class="form-select from-custom user_district" id="district"
                                    aria-label="Default select example" disabled>
                                    <option>Chọn Quận - Huyện</option>
                                </select>
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="col-6 mt-3">
                            <div class="mb-3">
                                <label for="user_email" class="form-label">Địa chỉ Email</label>
                                <input type="text" class="form-control from-custom user_email" id="user_email"
                                    placeholder="Địa chỉ Email người dùng ...">
                                <span class="error"></span>
                            </div>
                        </div>


                        <div class="col-6 mt-3">
                            <div class="mb-3">
                                <label for="ward" class="form-label">Xã / Phường</label>
                                <select class="form-select from-custom user_wards" id="ward"
                                    aria-label="Default select example" disabled>
                                    <option>Chọn Xã - Phường</option>
                                </select>
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="col-12" style="text-align: end;">
                            <button type="button" class="btn btn-save" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" disabled>
                                Lưu thay đổi
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="border-radius: 0 !important;">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xác thực mật khẩu</h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="" style="text-align: initial">
                                                <label for="user_password__authentication" class="form-label">Mật
                                                    khẩu</label>
                                                <input type="text"
                                                    class="form-control from-custom user_password__authentication"
                                                    id="user_password__authentication" placeholder="Nhập mật khẩu">
                                                <span class="error"></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="border-top: none;">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Hủy</button>
                                            <button type="button" class="btn btn-primary btn__check__password">Thực
                                                hiện</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row edit-password d-none">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Mật khẩu cũ</label>
                                <input type="text" class="form-control from-custom current_password"
                                    id="current_password" placeholder="Nhập mật khẩu hiện tại ...">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Mật khẩu mới</label>
                                <input type="text" class="form-control from-custom new_password" id="new_password"
                                    placeholder="Nhập mật khẩu mới ...">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="new_password__confirm" class="form-label">Nhập lại mật khẩu mới</label>
                                <input type="text" class="form-control from-custom new_password__confirm"
                                    id="new_password__confirm" placeholder="Nhập lại mật khẩu mới">
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-12" style="text-align: end;">
                            <button class="btn btn-primary btn_save_password" id="btn_save_password">Lưu thay đổi</button>
                        </div>
                    </div>

                    <div class="row edit-order d-none">
                        <div class="col-12">
                            <h5 style="text-align: center">Sản phẩm đã đặt gần đây</h5>

                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="order__table" width='5%'>STT</th>
                                                <th class="order__table" width='20%'>Mã đơn hàng</th>
                                                <th class="order__table" width='15%'>Số loại SP</th>
                                                <th class="order__table" width='15%'>Tổng SP</th>
                                                <th class="order__table" width='15%'>Thành tiền</th>
                                                <th class="order__table" width='15%'>Thanh toán</th>
                                                <th class="order__table" width='15%'>Trạng thái</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="order__table" width='5%'>1</th>
                                                <th class="order__table" width='20%'>OD171700</th>
                                                <th class="order__table" width='15%'>7</th>
                                                <th class="order__table" width='15%'>7</th>
                                                <th class="order__table" width='15%'>945000</th>
                                                <th class="order__table" width='15%'>PAY</th>
                                                <th class="order__table" width='20%'>chưa xác nhận</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="module" src="{{ asset('customer/js/Layout/UserInfo/index.js') }}"></script>
@endsection
