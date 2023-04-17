@extends('admin.layout.index')
<link rel="stylesheet" href="{{ asset('admin/custom_admin/customOrderDetail.css') }}">
@section('contents')
    <div class="content-wrapper">
        <div class="page-header">

            @if (session('msg'))
                <div class="alert alert-success text-center">
                    {{ session('msg') }}
                </div>
            @endif

            <h3 class="page-title"> Danh sách đơn hàng </h3>
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
                                    <th width="12%"> Người đặt </th>
                                    <th width="15%">
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
                                    <th width="8%"> Thanh toán </th>
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
                                        <td> {{ $index + 1 }} </td>
                                        <td> {{ $order->code_order }} </td>
                                        <td style="width: 165px;"> {{ $order->deliveryAddress->name }} </td>
                                        <td>{{ $order->deliveryAddress->email }}</td>
                                        <td>{{ $order->deliveryAddress->phone }}</td>
                                        <td> {{ $order->quantity }} </td>
                                        <td> {{ $order->total_price }} </td>
                                        <td> {{ $order->payment_form }} </td>
                                        <td>
                                            @if ($order->order_status_id == 1)
                                                <div class="badge btn-gradient-secondary">
                                                    {{ $order->orderStatus->name }}
                                                </div>
                                            @elseif ($order->order_status_id == 2)
                                                <div class="badge btn-gradient-info">
                                                    {{ $order->orderStatus->name }}
                                                </div>
                                            @elseif ($order->order_status_id == 3)
                                                <div class="badge btn-gradient-primary">
                                                    {{ $order->orderStatus->name }}
                                                </div>
                                            @elseif ($order->order_status_id == 4)
                                                <div class="badge btn-gradient-success">
                                                    {{ $order->orderStatus->name }}
                                                </div>
                                            @elseif ($order->order_status_id == 5)
                                                <div class="badge btn-gradient-danger">
                                                    {{ $order->orderStatus->name }}
                                                </div>
                                            @endif
                                        </td>
                                        <td> {{ date_format($order->created_at, 'd-m-Y') }} </td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('admin.orders.show', $order->code_order) }}"
                                                    class="" style="color: black; padding: 6px">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4" style="float: right;">
                            {{ $orders->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
