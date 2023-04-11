@extends('customer.layout.index')
@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/shoppingCart.css') }}">
@endsection
@section('contents')
    <div class="container mt-4" id="container-cart">
        <form action="" method="">
            @csrf
            <div class="row">
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
                </div>

                <div class="col-lg-3">
                    <div class="sidebar-cart">
                        <div class="cart-collaterals">
                            <div class="cart-collaterals_detail">
                                <div class="input-group discount-code">
                                    <input type="text" class="form-control discount-code_input" placeholder="Mã giảm giá"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2"
                                        style="width: 80%;">
                                    <button type="button" class="btn btn-secondary discount-code_btn " id="basic-addon2"
                                        style="width: 20%;">Áp dụng</button>
                                </div>
                            </div>
                        </div>

                        <div class="cart-totals">
                            <div class="cart-total_info">
                                <table class="cart-total">
                                    <tbody class="cart-total_body">
                                        <tr class="order-subtotal">
                                            <td class="cart-total-left">
                                                <label>Tổng phụ:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control total-products"
                                                    name="total_payment" value="0"
                                                    style="border: none; text-align: end; padding: 3px 0; font-size: 16px;font-weight: 500;"
                                                    disabled>
                                            </td>
                                        </tr>
                                        <tr class="order-subtotal-discount">
                                            <td class="cart-total-left cross-sell">
                                                <label>Mã giảm giá:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control code" data-value="20000"
                                                    value="- 100.000đ"
                                                    style="border: none; text-align: end; padding: 3px 0;" disabled>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td class="cart-total-left">
                                                <label>Thành tiền:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control total-payment"
                                                    name="total_payment" value="0"
                                                    style="border: none; text-align: end; padding: 3px 0; font-size: 16px;font-weight: 500;"
                                                    disabled>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="checkout-buttons">
                                <a href="{{ route('order') }}" class="btn btn-primary checkout-button">Tiến hành đặt
                                    hàng</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </form>
    </div>
@endsection

@section('js')
    <script type="module" src="{{ asset('customer/js/Layout/UserInfo/index.js') }}"></script>
@endsection
