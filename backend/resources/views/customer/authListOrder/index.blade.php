@extends('customer.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/AuthListProduct.css') }}">
@endsection

@section('contents')
    <div class="container mt-4" style="background: #FFF">
        <div class="row">
            <div class="col-12 cart" style="position: relative;">
                <p id="font600">Đơn hàng đã đặt</p>
                {{-- <table class="donhang_dadat">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Thành tiền</th>
                            <th>Trạng thái</th>
                            <th>Tình trạng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="click_chitiet">
                            <label for="xacnhan_pay" class="click_tr_in_table">
                                <td>1</td>
                                <td>MX093677</td>
                                <td id="fontbold"> 148.250 đ</td>
                                <td>
                                    <p>Chưa thanh toán</p>
                                </td>
                                <td>
                                    <p>Đang vận chuyển <i class="fa-solid fa-car-side"></i></p>
                                </td>
                                <td>
                                    <label for="xacnhan_pay" class="button_trangthai_donhang">Chi tiết đơn hàng</label>
                                </td>
                            </label>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>MX03223537</td>
                            <td id="fontbold"> 148.250 đ</td>
                            <td>
                                <p><i class="fa-solid fa-check"></i> Đã thanh toán</p>
                            </td>
                            <td>
                                <p>Giao Hàng Thành Công <i class="fa-sharp fa-solid fa-circle-check"></i> </p>
                            </td>
                            <td>
                                <label for="xacnhan_pay" class="button_trangthai_donhang">Chi tiết đơn hàng</label>
                                <input type="checkbox" class="xac_nhan" name="" id="xacnhan_pay">
                                <label for="xacnhan_pay" class="thanhtoan_overlay"></label>
                                <div class="thanhtoan_xacnhan" id="scoll">
                                    <div class="thanhtoan_xacnhan_close">
                                        <label class="close_xacnhan_pay" for="xacnhan_pay"><i
                                                class="fa-solid fa-xmark"></i></label>
                                    </div>
                                    <p id="font800" style="color:#02bbff;">Chi tiết đơn hàng</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table> --}}

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="table_lis_order">
                        {{-- <tr>
                            <td>2</td>
                            <td>MX03223537</td>
                            <td id="fontbold"> 148.250 đ</td>
                            <td>
                                <p><i class="fa-solid fa-check"></i> Đã thanh toán</p>
                            </td>
                            <td>
                                <p>Giao Hàng Thành Công <i class="fa-sharp fa-solid fa-circle-check"></i> </p>
                            </td>
                            <td>2023-12-3</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">Chi tiết đơn hàng</button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>




        </div>
    </div>
@endsection

@section('js')
    <script type="module" src="{{ asset('customer/js/Layout/authListOrder/index.js') }}"></script>
@endsection
