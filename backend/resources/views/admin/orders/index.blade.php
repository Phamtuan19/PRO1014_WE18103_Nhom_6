@extends('admin.layout.index')

@section('contents')
    <div class="content-wrapper">
        <div class="page-header">

            @if (session('msg'))
                <div class="alert alert-success text-center">
                    {{ session('msg') }}
                </div>
            @endif


            <h3 class="page-title"> Danh sách đơn hàng </h3>
            {{-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="?isDelete=delete" class="{{ isset(request()->isDelete) ? 'd-none' : false }}"
                            style="color: #0d6efd; font-weight: 600">Danh sách đã xóa </a>
                        <a href="?" class="{{ !isset(request()->isDelete) ? 'd-none' : false }}"
                            style="color: #0d6efd; font-weight: 600">Danh sách hoạt động</a>
                    </li>
                </ol>
            </nav> --}}
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body" style="padding: 2.5rem 0.5rem;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th width="9%">
                                        {{-- <a href="?orderBy=name&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}" --}}
                                        {{-- class="{!! request()->orderBy == 'name' ? 'active_custom' : '' !!}"> --}}
                                        Mã Đơn
                                        <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        {{-- </a> --}}
                                    </th>
                                    <th width="15%"> Người đặt </th>
                                    <th>
                                        {{-- <a href="?orderBy=email&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'email' ? 'active_custom' : '' !!}"> --}}
                                        Email
                                        <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        {{-- </a> --}}
                                    </th>
                                    <th width="10%">
                                        {{-- <a href="?orderBy=phone&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'phone' ? 'active_custom' : '' !!}"> --}}
                                        Phone
                                        <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        {{-- </a> --}}
                                    </th>
                                    <th>Tổng SP</th>
                                    <th>Tổng Tiền</th>
                                    <th width="5%"> Thanh toán </th>
                                    <th width="5%"> Trạng thái </th>
                                    <th>
                                        {{-- <a href="?orderBy=created_at&orderType={{ request()->orderType == 'ASC' ? 'DESC' : 'ASC' }}"
                                            class="{!! request()->orderBy == 'created_at' ? 'active_custom' : '' !!}"> --}}
                                        Created_at
                                        <i class="fa-solid fa-right-left menu-icon__custom"></i>
                                        {{-- </a> --}}
                                    </th>
                                    <th width="5%">Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $index => $order)
                                    <tr>
                                        <td> {{ $index }} </td>
                                        <td> {{ $order->code_order }} </td>
                                        <td style="width: 165px;"> Phạm anh tuấn </td>
                                        <td> Phamtuan19hd@gmail.com</td>
                                        <td>0346027346 </td>
                                        <td> {{ $order->quantity }} </td>
                                        <td> {{ $order->total_price }} </td>
                                        <td> {{ $order->payment_form }} </td>
                                        <td> {{ orderStatus($order->order_status) }} </td>
                                        <td> {{ date_format($order->created_at, 'd-m-Y') }} </td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('admin.orders.show', $order->code_order) }}" class="" style="color: black; padding: 6px">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- <div class="" style="float: right;">
                            {{ $users->appends(request()->all())->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
