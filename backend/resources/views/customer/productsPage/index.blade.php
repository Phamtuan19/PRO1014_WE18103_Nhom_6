@extends('customer.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/products-list.css') }}">
@endsection

@section('contents')
    <div class="container my-4" style="background: #FFF">
        <div class="row" style="padding-top: 24px">
            <div class="col-lg-3 col-md-3 col-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        {{-- <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit">
                                <i class="fa-solid fa-magnifying-glass icon_search"></i>
                            </button>
                        </form> --}}
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading active">
                                    <a data-toggle="collapse" data-target="#collapseOne">Danh mục</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll sidebar__categories children-categories" tabindex="1"
                                                style="overflow-y: hidden; outline: none;">
                                            </ul>
                                            <span class="m-show-more-action">Xem thêm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Tác giả</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul class="nice-scroll sidebar__author children-categories">
                                            </ul>
                                            <span class="m-show-more-action">Xem thêm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Giá</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body" style="height: 170px;">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a class="query__shop__products" href="?price=0-100000" data-key="price"
                                                        data-value="0-100000">0đ - 100.000đ</a></li>
                                                <li><a class="query__shop__products" href="?price=100000-150000"
                                                        data-key="price" data-value="100000-150000">100.000đ - 150.000đ</a>
                                                </li>
                                                <li><a class="query__shop__products" href="?price=150000-200000"
                                                        data-key="price" data-value="150000-200000">150.000đ - 200.000đ</a>
                                                </li>
                                                <li><a class="query__shop__products" href="?price=200000-30000"
                                                        data-key="price" data-value="200000-30000">200.000đ - 300.000đ</a>
                                                </li>
                                                <li><a class="query__shop__products" href="?price=300000-99999999"
                                                        data-key="price" data-value="300000-99999999">300.000đ - trở lên</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Nhà xuất bản</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul class="nice-scroll sidebar__publishing-house children-categories">
                                            </ul>
                                            <span class="m-show-more-action">Xem thêm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">

                            <div class=" shop__product__option__right ">
                                <select id="order__by" class="query__shop__products__select" data-key="sort"
                                    data-value="san-pham-moi">
                                    <option value="gia-thap-nhat">Giá thấp nhất</option>
                                    <option value="gia-cao-nhat">Giá cao nhất</option>
                                    <option value="san-pham-moi" selected>Sản phẩm mới nhất</option>
                                    <option value="san-pham-cu">Sản phẩm cũ nhất</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row products_list__items">

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            {{-- <a class="active" href="#" data-key="page" data-value="1">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">21</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module" src="{{ asset('customer/js/Layout/ProductPage/index.js') }}"></script>

    {{-- <script></script> --}}
@endsection
