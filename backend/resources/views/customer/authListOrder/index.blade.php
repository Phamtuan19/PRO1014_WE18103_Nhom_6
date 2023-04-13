@extends('customer.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/AuthListProduct.css') }}">
@endsection

@section('contents')
    <div class="container mt-4" style="background: #FFF">
        <div class="row">
            <div class="col-12 cart" style="position: relative;">
                <p id="font600">Đơn hàng đã đặt</p>
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
                    </tbody>
                </table>
                <div class="modal d-none" style="display: block; transition: all 0.5s;">
                    <div class="modal-dialog" style="min-width: 1000px;">
                        <div class="modal-content">
                            <div class="modal-header" style="padding: 12px 24px;">
                                <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng:
                                    <span class="order__code" style="margin-left: 12px; font-weight: 600;"></span>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="">
                                    <div class="detail__order row">

                                    </div>
                                </div>
                                <table class="table table-hover mt-4">
                                    <thead>
                                        <tr>
                                            <th width="5%"> # </th>
                                            <th width="15%"> Hình ảnh SP </th>
                                            <th width="20%"> Tên SP </th>
                                            <th width="15%"> Giá </th>
                                            <th width="15%"> Giá sale </th>
                                            <th width="15%">Số lượng</th>
                                            <th width="15%"> Thành tiền </th>
                                        </tr>
                                    </thead>
                                    <tbody class="content__table__order">

                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module" src="{{ asset('customer/js/Layout/authListOrder/index.js') }}"></script>
@endsection
