@extends('admin.layout.index')

@section('link_css')
    <link rel="stylesheet" href="{{ asset('admin/custom_admin/customOrderDetail.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> --}}
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
                                <a href="{{ route('admin.orders') }}" style="color: #000">
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
                                    style="margin-right: 12px; height: 38px !important; width: 150px; color #000">
                                    @foreach ($status as $value)
                                        @if ($order[0]->order_status_id <= 2)
                                            @if ($value->id == $order[0]->order_status_id || $value->id == $order[0]->order_status_id + 1 || $value->id == 5)
                                                <option value="{{ $value->id }}"
                                                    {{ $order[0]->order_status_id == $value->id ? 'selected' : false }}>
                                                    {{ $value->name }}
                                                </option>
                                            @endif
                                        @elseif ($order[0]->order_status_id > 2 && $order[0]->order_status_id < 5)
                                            @if (
                                                $value->id == $order[0]->order_status_id ||
                                                    ($value->id == $order[0]->order_status_id + 1 && $order[0]->order_status_id + 1 < 5))
                                                <option value="{{ $value->id }}"
                                                    {{ $order[0]->order_status_id == $value->id ? 'selected' : false }}>
                                                    {{ $value->name }}
                                                </option>
                                            @endif
                                        @elseif ($order[0]->order_status_id == 5)
                                            @if ($value->id == 5)
                                                <option value="{{ $value->id }}"
                                                    {{ $order[0]->order_status_id == $value->id ? 'selected' : false }}>
                                                    {{ $value->name }}
                                                </option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>

                                <button
                                    class="btn btn-gradient-success btn-fw d-flex align-items-center btn-save__order__status"
                                    style="height: 38px !important; margin-right: 12px;"
                                    data-id="{{ $order[0]->order_status_id }}" disabled>
                                    Chuyển trạng thái
                                </button>
                            </form>

                        </div>

                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="" style="display: flex;padding-top: 28px 0;flex-direction: column;">
                                    <span style="font-size: 48px; font-weight: 600;">{{ $order[0]->code_order }}</span>
                                    <p class="mt-2">
                                        <small style="font-size: 16px; font-weight: 600; margin-right: 8px">Ngày tạo:
                                        </small>
                                        <small>{{ $order[0]->created_at }}</small>
                                    </p>
                                    <p class="single-printr mt-2">
                                        <i class="mdi mdi-printer"></i>
                                        In Đơn Hàng
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="status__order">
                                    <div class="date__time__status">
                                        <p class="status__hour">{{ date_format($order[0]->updated_at, 'h:i:s') }}</p>
                                        <span class="status__date">{{ date_format($order[0]->updated_at, 'd-m-Y') }}</span>
                                    </div>
                                    @if ($order[0]->order_status_id == 1)
                                        <div class="status__content">{{ $order[0]->orderStatus->name }}</div>
                                    @elseif ($order[0]->order_status_id == 2)
                                        <div class="status__content" style="color: #047edf">
                                            {{ $order[0]->orderStatus->name }}</div>
                                    @elseif ($order[0]->order_status_id == 3)
                                        <div class="status__content" style="color: #9a55ff">
                                            {{ $order[0]->orderStatus->name }}</div>
                                    @elseif ($order[0]->order_status_id == 4)
                                        <div class="status__content" style="color: #07cdae">
                                            {{ $order[0]->orderStatus->name }}</div>
                                    @elseif ($order[0]->order_status_id == 5)
                                        <div class="status__content" style="color: #fe7096">
                                            {{ $order[0]->orderStatus->name }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="row">

                                {{-- Danh sách sản phẩm --}}
                                <div class="col-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%"> # </th>
                                                <th width="15%"> Hình ảnh SP </th>
                                                <th width="20%"> Tên SP </th>
                                                <th width="15%"> Giá </th>
                                                <th width="15%"> Giá sale </th>
                                                <th width="15%"> Số lượng SP</th>
                                                <th width="15%"> Thành tiền </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($detail as $index => $item)
                                                {{-- @dd( $item->product->image[0]->image_url ) --}}
                                                <tr>
                                                    <td> {{ $index + 1 }} </td>
                                                    <td>
                                                        <img src="{{ $item->product->image[0]->image_url }}" alt=""
                                                            style=" width: 80px !important; height: 100px !important; border-radius: 0!important;">
                                                    </td>
                                                    <td> {{ $item->product->name }} </td>
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
                                <div class="col-8" style="margin-top: 32px">
                                    <div class="form-group">
                                        <label for="user_name">Người nhận: </label>
                                        <input type="text" class="form-control" id="user_name" placeholder="Username"
                                            value="{{ $deliveryAddress->name }}" style="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_phone">Email: </label>
                                        <input type="text" class="form-control" id="user_phone" placeholder="Username"
                                            value="{{ $deliveryAddress->email }}" style="" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_email">Email: </label>
                                        <input type="text" class="form-control" id="user_email" placeholder="Username"
                                            value="{{ $deliveryAddress->email }}" style="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="user_addres">Email: </label>
                                        <input type="text" class="form-control" id="user_addres" placeholder="Username"
                                            value="{{ $deliveryAddress->province_city . ' - ' . $deliveryAddress->county_district . ' - ' . $deliveryAddress->house_number_street_name }}"
                                            style="" disabled>
                                    </div>
                                </div>

                                <div class="col-4" style="margin-top: 32px">
                                    <label for="">Ghi chú: </label>
                                    @foreach ($order[0]->note as $note)
                                        <div
                                            style="padding: 15px 0; line-height: 1.5rem; border-bottom: 1px solid #f2edf3">
                                            <span
                                                style="font-size: 14px; margin-right: 12px; font-family: ubuntu-medium, sans-serif; font-weight: initial">
                                                {{ $note->note_takers }}
                                                : </span>
                                            <span class="text-danger"
                                                style="font-size: 14px; font-family: ubuntu-medium, sans-serif; font-weight: initial">{{ $note->content }}
                                            </span>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-gradient-primary mt-3" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" style="height: 40px !important">
                                        Thêm ghi chú
                                    </button>
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
        const select_status = document.querySelector(".order-status__select");
        const btn_save = document.querySelector(".btn-save__order__status");

        select_status.onclick = () => {
            if (btn_save.dataset.id === select_status.value) {
                btn_save.setAttribute("disabled", true);
            } else {
                btn_save.removeAttribute("disabled");
            }
        }
    </script>
@endsection
