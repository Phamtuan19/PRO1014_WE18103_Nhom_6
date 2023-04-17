@extends('admin.layout.index')

@section('link_css')
    <link rel="stylesheet" href="{{ asset('admin/custom_admin/dashboard.css') }}">
@endsection


@section('contents')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span>
                            <img src="https://dreamspos.dreamguystech.com/html/template/assets/img/icons/dash2.svg"
                                alt="img">
                        </span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>
                            <span class="counters" data-value="{{ $totalRevenue }}">0</span>
                        </h5>
                        <span class="dash-widgetcontent__title">Tổng doanh thu</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
                    <div class="dash-widgetimg">
                        <span>
                            <img src="{{ asset('admin/image/book.png') }}" alt="img">
                        </span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>
                            <span class="counters" data-count="{{ $totalProducts }}">{{ $totalProducts }}</span>
                        </h5>
                        <span class="dash-widgetcontent__title">Tổng sản phẩm</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin/image/shopping-bag.png') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>
                            <span class="counters" data-value="{{ $totalOrders }}">{{ $totalOrders }}</span>
                        </h5>
                        <span class="dash-widgetcontent__title">Tổng đơn hàng</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="{{ asset('admin/image/user.png') }}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>
                            <span class="counters" data-value="{{ $totalUsers }}">{{ $totalUsers }}</span>
                        </h5>
                        <span class="dash-widgetcontent__title">Tổng người đăng ký</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <h4 class="card-title float-left">Doanh số</h4>
                            <div id="visit-sale-chart-legend"
                                class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                        </div>
                        <canvas id="acquisitions" class="mt-4"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-7 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Top người dùng</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Tên người dùng </th>
                                        <th> Số điện thoại </th>
                                        <th> Email </th>
                                        <th> Số đơn </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topUserOrders as $index => $user)
                                        <tr>
                                            <th>{{ $index + 1 }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <label class="badge badge-gradient-danger"
                                                    style="font-size: 14px;">{{ $user->total_orders }} đơn</label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sản phẩm bán nhiều nhất</h4>
                        <table class="table table-hover">
                            <thead>
                                <tr style="background-color: #e9ecef">
                                    <th width="10%">#</th>
                                    <th width="10%">Đã bán</th>
                                    <th width="55%">Sản phẩm</th>
                                    <th width="25%">Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topProductsOrder as $index => $product)
                                    <tr style="cursor: pointer">
                                        <td>#{{ $index + 1 }}</td>
                                        <td style="text-align: center;">{{ $product->quantity_sold }}</td>
                                        <td class="productimgname">
                                            <a href="{{ route('admin.products.show', $product->id) }}" class="product-img">
                                                <img src="{{ $product->image_url }}" alt="product">
                                            </a>
                                            <a href="{{ route('admin.products.show', $product->id) }}" class="productimgname__name">{{ $product->name }}</a>
                                        </td>
                                        <td class="text-danger">
                                            @if (!empty($product->promotion_price))
                                                <span>{{ $product->promotion_price }}</span>
                                            @else
                                                <span>{{ $product->price }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
@endsection

@section('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
    <script type="module" src="{{ asset('admin/custom_admin/JS/Dashboard/index.js') }}"></script>
@endsection
