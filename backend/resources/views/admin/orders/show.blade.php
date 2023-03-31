@extends('admin.layout.index')

@section('link_css')
    <link rel="stylesheet" href="{{ asset('admin/custom_admin/customOrderDetail.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
@endsection

@section('contents')
    <div class="content-wrapper" style="background: #F4F6F8; padding: 36px">


        @if (session('msg'))
            <div class="alert alert-success text-center">
                {{ session('msg') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="padding: 0 1rem 2.5rem 1rem;">

                        <div class="d-flex"
                            style="align-items: center; height: 3.5rem; margin: 0 -1rem; border-bottom: 1px solid #ccc; box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px; justify-content: space-between">
                            <h3 style="margin-bottom: 0; border-radius: 5px; margin-left: 12px; font-size: 1.55rem">
                                <a href="#" style="color: #000">
                                    <span class="page-title-icon bg-gradient-primary text-white me-2"
                                        style="border-radius: 5px">
                                        <i class="mdi mdi-arrow-left"></i>
                                    </span>
                                    Trở lại
                                </a>
                            </h3>

                            <form class="d-flex" action="{{ route('admin.orders.status.update', $order[0]->id) }}"
                                method="POST">
                                @csrf
                                @method('PATCH')

                                <select class="form-control order-status__select" name="order_status"
                                    style="margin-right: 12px; height: 36px !important; width: 150px; color #000">
                                    @foreach ($status as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $order[0]->order_status_id === $value->id ? 'selected' : false }}>
                                            {{ $value->name }}</option>
                                    @endforeach
                                </select>

                                <button class="btn btn-gradient-success btn-fw"
                                    style="height: 36px !important; margin-right: 12px">Chuyển
                                    trạng thái
                                </button>
                            </form>

                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="" style="display: flex;padding-top: 28px 0;flex-direction: column;">
                                    <span style="font-size: 48px; font-weight: 600;">{{ $order[0]->code_order }}</span>
                                    <p>
                                        <small style="font-size: 16px; font-weight: 600">Ngày tạo: </small>
                                        <small>{{ $order[0]->created_at }}</small>
                                    </p>
                                    <p class="single-printr">
                                        <i class="mdi mdi-printer"></i>
                                        In Đơn Hàng
                                    </p>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="track">
                                    @foreach ($status as $value)
                                        <div class="step">
                                            {{-- <span class="step-time">10-03-2023 14:50</span> --}}
                                            <span class="icon">
                                                <i class="fa fa-check"></i>
                                            </span>
                                            <span class="text">{{ $value->name }}</span>
                                        </div>
                                    @endforeach
                                    {{-- <div class="step active">
                                        <span class="step-time">10-03-2023 14:50</span>
                                        <span class="icon">
                                            <i class="fa fa-check"></i>
                                        </span>
                                        <span class="text">chờ xử lý</span>
                                    </div>
                                    <div class="step active">
                                        <span class="icon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <span class="text">đang xử lý</span>
                                    </div>
                                    <div class="step">
                                        <span class="icon">
                                            <i class="fa fa-truck"></i>
                                        </span>
                                        <span class="text">đã vận chuyển</span>
                                    </div>
                                    <div class="step">
                                        <span class="icon">
                                            <i class="fa fa-box"></i>
                                        </span>
                                        <span class="text">Thành công</span>
                                    </div>
                                    <div class="step">
                                        <span class="icon">
                                            <i class="fa fa-box"></i>
                                        </span>
                                        <span class="text">Hủy</span>
                                    </div> --}}

                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="row">
                                {{-- Danh sách sản phẩm --}}
                                <div class="col-8">

                                    <div class="d-flex"
                                        style="flex-direction: column; justify-content: flex-end; align-items: center">
                                        <table class="table table-hover" style="border: 1px solid #ccc">
                                            <thead>
                                                <tr>
                                                    <th>Tổng tiền:</th>
                                                    <th>{{ $order[0]->total_price }} VND</th>
                                                </tr>
                                                <tr>
                                                    <th>Mã giảm giá:</th>
                                                    <th>0 VND</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <table class="table table-hover" style="cursor: pointer; border: 1px solid #ccc">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Tên SP </th>
                                                <th> Hình ảnh SP </th>
                                                <th> Giá </th>
                                                <th> Giá sale </th>
                                                <th> Số lượng SP</th>
                                                <th> Thành tiền </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detail as $index => $item)
                                                {{-- @dd( $item->product->image[0]->image_url ) --}}
                                                <tr>
                                                    <td> {{ $index + 1 }} </td>
                                                    <td> {{ $item->product->name }} </td>
                                                    <td>
                                                        <img src="{{ $item->product->image[0]->image_url }}" alt=""
                                                            style=" width: 120px !important; height: 150px !important; border-radius: 0!important;">
                                                    </td>
                                                    <td> {{ $item->price }} VND </td>
                                                    <td> {{ $item->price_sale }} VND </td>
                                                    <td> {{ $item->quantity }} </td>
                                                    <td> {{ $item->total_price }} VND </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- END --}}
                                {{-- Thông tin người mua hàng --}}
                                <div class="col-4">
                                    <table class="table table-hover" style="border: 1px solid #ccc">
                                        <thead>
                                            <tr>
                                                <th style="padding: 15px !important">Người nhận:</th>
                                                <th class="text-danger" style="padding: 15px !important">
                                                    {{ $deliveryAddress->name }}</th>

                                            </tr>
                                            <tr>
                                                <th style="padding: 15px !important">Email:</th>
                                                <th class="text-danger" style="padding: 15px !important">
                                                    {{ $deliveryAddress->email }}</th>
                                            </tr>
                                            <tr>
                                                <th style="padding: 15px !important">Phone:</th>
                                                <th class="text-danger" style="padding: 15px !important">
                                                    {{ $deliveryAddress->phone }}</th>
                                            </tr>
                                            <tr>
                                                <th style="padding: 15px !important">Address:</th>
                                                <th class="text-danger" style="padding: 15px !important">
                                                    {{ $deliveryAddress->province_city . ' - ' . $deliveryAddress->county_district . ' - ' . $deliveryAddress->house_number_street_name }}
                                                </th>
                                            </tr>
                                        </thead>

                                    </table>
                                    <div class="" style="border: 1px solid #ccc">
                                        @foreach ($order[0]->note as $note)
                                            <div
                                                style="padding: 15px; line-height: 1.5rem; border-bottom: 1px solid #f2edf3">
                                                <span
                                                    style="margin-right: 12px; font-family: ubuntu-medium, sans-serif; font-weight: initial">Notes
                                                    ({{ $note->note_takers }})
                                                    : </span>
                                                <span class="text-danger"
                                                    style="font-family: ubuntu-medium, sans-serif; font-weight: initial">{{ $note->content }}
                                                </span>
                                            </div>
                                        @endforeach
                                        <button type="button" class="btn btn-gradient-primary me-2 m-3"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            style="height: 40px !important">
                                            Thêm ghi chú
                                        </button>
                                    </div>
                                </div>
                                {{-- END --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Ghi chú</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.orders.notes', $order[0]->code_order) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="content"></textarea>
                    </div>
                    <div class="modal-footer">
                        <span class="btn btn-secondary" data-bs-dismiss="modal">Hủy</span>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // window.onload = function() {
        const steps = document.querySelectorAll('.step');
        const orderStatus = document.querySelector('.order-status__select');

        steps.forEach((value, index) => {
            if (index + 1 <= Number(orderStatus.value)) {
                value.classList.add('active');
            }
        })
        // }
    </script>
@endsection
