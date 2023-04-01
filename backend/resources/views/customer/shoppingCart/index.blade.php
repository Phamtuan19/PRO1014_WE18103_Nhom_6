@extends('customer.layout.index')
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

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
                                    <th class="total__money" scope="col" style="text-align: left !important;">Số lượng</th>
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
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <button class="btn btn-secondary discount-code_btn" id="basic-addon2">Áp dụng</button>
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
                                                <input type="text" class="form-control total-money" value="0"
                                                    readonly style="border: none; text-align: end; padding: 3px 0;"
                                                    disabled>
                                            </td>
                                        </tr>
                                        <tr class="order-subtotal-discount">
                                            <td class="cart-total-left cross-sell">
                                                <label>Mã giảm giá:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control" value="0" readonly
                                                    style="border: none; text-align: end; padding: 3px 0;" disabled>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td class="cart-total-left">
                                                <label>Tổng cộng:</label>
                                            </td>
                                            <td class="cart-total-right">
                                                <input type="text" class="form-control total-payment"
                                                    name="total_payment" value="0" readonly
                                                    style="border: none; text-align: end; padding: 3px 0; font-size: 16px;font-weight: 500;" disabled>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="checkout-buttons">
                                <a href="{{ route('order') }}"
                                    class="btn btn-primary checkout-button">Tiến hành đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </form>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
</script>
<script type="module" src="{{ asset('customer/js/shoppingCart.js') }}"></script>
@endsection
