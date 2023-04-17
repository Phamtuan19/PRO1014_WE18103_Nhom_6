@extends('customer.layout.index')
@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/shoppingCart.css') }}">
@endsection
@section('contents')
    <div class="container mt-4" id="container-cart">
        <div class="row shopping_page">


            <div class="col-lg-9 pb-4" style="padding-right: 24px;">
                <div class="cart-detail" style="background-color: #fff; border-radius: 5px; padding: 24px 12px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="font-size: 14px;">
                                <th scope="col" width="200px">Hình ảnh</th>
                                <th scope="col" style="text-align: left !important;">Tên sản phẩm</th>
                                <th scope="col" style="text-align: left !important;">Giá gốc</th>
                                <th scope="col" style="text-align: left !important;">Giá sale</th>
                                <th class="total__money" scope="col" style="text-align: left !important;">Số lượng
                                </th>
                                <th scope="col" style="text-align: left !important;">Thành tiền</th>
                                <th scope="col" width="50px" style="text-align: left !important;"></th>
                            </tr>
                        </thead>
                        <tbody class="cart-table_body">

                        </tbody>
                    </table>
                </div>

                <div class="mt-4" style="background-color: #fff; border-radius: 5px; padding: 0 12px 24px 12px;">
                    <h4 style="padding: 24px 0; text-align: center;">Thông tin khách hàng</h4>
                    <div class="container-fluid">
                        <div class="row">
                            {{-- Name - userID --}}
                            <div class="col-12 mb-3">
                                <label for="" class="form-label"
                                    style="font-weight: 600; color: font-size: 16px">Tên khách hàng</label>
                                <input type="text" class="form-control order_name" name="name" data-userId=""
                                    value="" style="height: 46px; color: #86868B; font-size: 14px">
                                <span class="text-danger" style="font-size: 16px"></span>

                            </div>
                            {{-- phone --}}
                            <div class="col-6 mb-3">
                                <label for="" class="form-label" style="font-weight: 600; color: font-size: 16px">Số
                                    điện thoại</label>
                                <input type="text" class="form-control order_phone" name="phone" value=""
                                    style="height: 46px; color: #86868B; font-size: 14px">
                                <span class="text-danger" style="font-size: 16px"></span>

                            </div>
                            {{-- email --}}
                            <div class="col-6 mb-3">
                                <label for="" class="form-label"
                                    style="font-weight: 600; color: font-size: 16px">Email</label>
                                <input type="text" class="form-control order_email" name="email" value=""
                                    style="height: 46px; color: #86868B; font-size: 14px">
                                <span class="text-danger" style="font-size: 16px"></span>
                            </div>

                            {{-- Thành phố --}}
                            <div class="col-6 mb-4">
                                <label for="" class="form-label" class="form-lable"
                                    style="font-weight: 600; color: font-size: 16px">Thành phố</label>
                                <select class="form-select province" id="province" data-name=""
                                    aria-label="Default select example" name="province"
                                    style="height: 46px; color: #86868B; font-size: 14px">
                                    <option value="">--- Chọn Thành Phố ---</option>
                                </select>
                                <span class="text-danger" style="font-size: 16px"></span>

                            </div>
                            {{-- Quận / huyện --}}
                            <div class="col-6 mb-3">
                                <label for="" class="form-label" class="form-lable"
                                    style="font-weight: 600; color: font-size: 16px">Quận / huyện</label>
                                <select class="form-select district" id="district" disabled="" value="nam sách"
                                    aria-label="Default select example" name="district"
                                    style="height: 46px; color: #86868B; font-size: 14px">
                                    <option value="">
                                        --- Chọn Quận huyện ---
                                    </option>
                                </select>
                                <span class="text-danger" style="font-size: 16px"></span>

                            </div>

                            <div class="col-6 mb-3">
                                <label for="" class="form-label" class="form-lable"
                                    style="font-weight: 600; color: font-size: 16px">Xã / phường</label>
                                <select class="form-select ward" id="ward" disabled value="an lâm"
                                    aria-label="Default select example" name="ward"
                                    style="height: 46px; color: #86868B; font-size: 14px">
                                    <option value="">
                                        --- Chọn Xã Phường
                                    </option>
                                </select>
                                <span class="text-danger" style="font-size: 16px"></span>

                            </div>

                            <div class="col-6 mb-3">
                                <label for="" class="form-label" class="form-lable"
                                    style="font-weight: 600; color: font-size: 16px">Thôn xóm / số nhà</label>
                                <input type="text" name="house_number" class="form-control house_number"
                                    id="house_number" value=""
                                    style="height: 46px; color: #86868B; font-size: 14px; text-transform: capitalize;"
                                    disabled>
                                <span class="text-danger" style="font-size: 16px"></span>

                            </div>

                            <div class="form-group">
                                <label for="order_note" style="font-weight: 600; color: font-size: 16px">Ghi
                                    chú</label>
                                <textarea class="form-control order_note" id="order_note" rows="3" name="note"
                                    placeholder="Thêm vào ghi chú của bạn ...">
                                        </textarea>
                                <span class="text-danger" style="font-size: 16px"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="sidebar-cart">
                    <div class="cart-collaterals">
                        <div class="cart-collaterals_detail">
                            <div class="input-group discount-code">
                                <input type="text" class="form-control discount-code_input" data-id=""
                                    placeholder="Mã giảm giá" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2"
                                    style="width: 100% !important; border-radius: 0 5px 5px 0; padding: 6px 75px 6px 12px;">
                                <span class="error"></span>
                                <button type="button" class="btn btn-secondary discount-code_btn " id="basic-addon2"
                                    style="position: absolute; right: 7px;height: 45px; z-index: 9999">Áp dụng</button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-totals">
                        <div class="cart-total_info">
                            <table class="cart-total">
                                <tbody class="cart-total_body">
                                    <tr class="order-subtotal">
                                        <td class="cart-total-left">
                                            Thành tiền:
                                        </td>
                                        <td class="cart-total-right">
                                            <input type="text" class="form-control total-payment" name="total_payment"
                                                value="0"
                                                style="border: none; text-align: end; padding: 3px 0; font-size: 16px;font-weight: 500;"
                                                disabled>
                                        </td>
                                    </tr>
                                    <tr class="order-subtotal-discount">
                                        <td class="cart-total-left cross-sell" style="width: 110px;">
                                            <label>Mã giảm giá:</label>
                                        </td>
                                        <td class="cart-total-right">
                                            <input type="text" class="form-control code" data-value=""
                                                value="" style="border: none; text-align: end; padding: 3px 0;"
                                                disabled>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <td class="cart-total-left">
                                            <label>Tổng tiền:</label>
                                        </td>
                                        <td class="cart-total-right">
                                            <input type="text" class="form-control total__money__payment"
                                                name="total_payment" value="0"
                                                style="border: none; text-align: end; padding: 3px 0; font-size: 16px;font-weight: 500;"
                                                disabled>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="delivery_form__box">
                            <input type="radio" id="delivery_form" class="delivery_form" checked>
                            <label for="delivery_form">Thanh toán khi nhận hàng</label>
                        </div>

                        <div class="checkout-buttons">
                            <button class="btn btn-primary checkout-button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Tiến hành đặt hàng
                            </button>
                        </div>
                    </div>
                </div>

                <div class="discount__list sidebar-cart" style="margin-top: 12px !important">
                    <div class="discount__list__title">
                        <h4 style="padding: 24px 0 12px 0; text-align: center;">Mã giảm giá</h4>
                    </div>
                    <div class="discount__list__item" style="padding: 0 12px;">



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script type="module" src="{{ asset('customer/js/Layout/ShoppingPage/index.js') }}"></script>
@endsection
