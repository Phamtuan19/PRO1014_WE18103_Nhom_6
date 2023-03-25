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
    <div class="content-wrapper">
        <div class="page-header">


        </div>
        <div class="page-header">
            <h3 class="page-title"> Chi tiết đơn hàng </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.categories.index') }}" style="color: #0d6efd; font-weight: 600">Danh sách
                            sản phẩm</a>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="padding: 2.5rem 1rem;">

                        @if (session('msg'))
                            <div class="alert alert-success text-center">
                                {{ session('msg') }}
                            </div>
                        @endif

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12" style="margin-bottom: 2.5rem !important">
                                    <h4 class="card-title">Trạng thái đơn hàng</h4>
                                </div>

                                <div class="col-12">
                                    <div class="box-progress">
                                        <div class="progress">
                                            <div class="progress-value"></div>
                                        </div>

                                        @foreach ($status as $key => $value)
                                            <div class="legend-box" style="left: {{ $value }}%;">
                                                <span class="legend-dots"
                                                    style="background:linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))"></span>
                                                <p style="position: absolute; right: -15px; top: -22px;">{{ $key }}
                                                </p>
                                                <p style="position: absolute; right: 10px; top: 25px">Time</p>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>

                        <div class="col-12 mt-4">
                            <div class="row">
                                <div class="col-8">

                                    <h4 class="card-title">Danh sách sản phẩm</h4>

                                    <table class="table table-hover" style="cursor: pointer">
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

                                    <div class="d-flex" style="justify-content: flex-end; align-items: center">
                                        <span style="font-weight: 500; margin-right: 12px">Tổng tiền:  </span>
                                        <span style="font-weight: 600">{{ $order[0]->total_price }} VND</span>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <h4 class="card-title">Hoverable Table</h4>
                                    <table class="table table-hover">
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
                                    @foreach ($order[0]->note as $note)
                                        <div style="padding: 15px; line-height: 1.5rem; border-bottom: 1px solid #f2edf3">
                                            <span
                                                style="margin-right: 12px; font-family: ubuntu-medium, sans-serif; font-weight: initial">Notes
                                                ({{ $note->note_takers }})
                                                : </span>
                                            <span class="text-danger"
                                                style="font-family: ubuntu-medium, sans-serif; font-weight: initial">{{ $note->content }}
                                            </span>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-gradient-primary me-2 mt-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" style="height: 40px !important">
                                        Thêm ghi chú
                                    </button>
                                </div>
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

    <script>
        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
@endsection
