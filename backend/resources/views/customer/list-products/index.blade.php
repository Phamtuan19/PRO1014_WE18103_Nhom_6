@extends('customer.layout.index')

@section('link')

    <link rel="stylesheet" href="{{ asset('customer/css/products-list.css') }}">
@endsection

@section('contents')
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-3 col-md-2">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit">
                                <i class="fa-solid fa-magnifying-glass icon_search"></i>
                            </button>
                        </form>
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
                                            <ul class="nice-scroll sidebar__categories" tabindex="1"
                                                style="overflow-y: hidden; outline: none;">
                                                <li><a href="#">Men (20)</a></li>
                                                <li><a href="#">Women (20)</a></li>
                                                <li><a href="#">Bags (20)</a></li>
                                                <li><a href="#">Clothing (20)</a></li>
                                                <li><a href="#">Shoes (20)</a></li>
                                                <li><a href="#">Accessories (20)</a></li>
                                                <li><a href="#">Kids (20)</a></li>
                                                <li><a href="#">Kids (20)</a></li>
                                                <li><a href="#">Kids (20)</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                <li><a href="#">Louis Vuitton</a></li>
                                                <li><a href="#">Chanel</a></li>
                                                <li><a href="#">Hermes</a></li>
                                                <li><a href="#">Gucci</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="#">$0.00 - $50.00</a></li>
                                                <li><a href="#">$50.00 - $100.00</a></li>
                                                <li><a href="#">$100.00 - $150.00</a></li>
                                                <li><a href="#">$150.00 - $200.00</a></li>
                                                <li><a href="#">$200.00 - $250.00</a></li>
                                                <li><a href="#">250.00+</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFour">Size</a>
                                </div>
                                <div id="collapseFour" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__size">
                                            <label for="xs">xs
                                                <input type="radio" id="xs">
                                            </label>
                                            <label for="sm">s
                                                <input type="radio" id="sm">
                                            </label>
                                            <label for="md">m
                                                <input type="radio" id="md">
                                            </label>
                                            <label for="xl">xl
                                                <input type="radio" id="xl">
                                            </label>
                                            <label for="2xl">2xl
                                                <input type="radio" id="2xl">
                                            </label>
                                            <label for="xxl">xxl
                                                <input type="radio" id="xxl">
                                            </label>
                                            <label for="3xl">3xl
                                                <input type="radio" id="3xl">
                                            </label>
                                            <label for="4xl">4xl
                                                <input type="radio" id="4xl">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseFive">Colors</a>
                                </div>
                                <div id="collapseFive" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__color">
                                            <label class="c-1" for="sp-1">
                                                <input type="radio" id="sp-1">
                                            </label>
                                            <label class="c-2" for="sp-2">
                                                <input type="radio" id="sp-2">
                                            </label>
                                            <label class="c-3" for="sp-3">
                                                <input type="radio" id="sp-3">
                                            </label>
                                            <label class="c-4" for="sp-4">
                                                <input type="radio" id="sp-4">
                                            </label>
                                            <label class="c-5" for="sp-5">
                                                <input type="radio" id="sp-5">
                                            </label>
                                            <label class="c-6" for="sp-6">
                                                <input type="radio" id="sp-6">
                                            </label>
                                            <label class="c-7" for="sp-7">
                                                <input type="radio" id="sp-7">
                                            </label>
                                            <label class="c-8" for="sp-8">
                                                <input type="radio" id="sp-8">
                                            </label>
                                            <label class="c-9" for="sp-9">
                                                <input type="radio" id="sp-9">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseSix">Tags</a>
                                </div>
                                <div id="collapseSix" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__tags">
                                            <a href="#">Product</a>
                                            <a href="#">Bags</a>
                                            <a href="#">Shoes</a>
                                            <a href="#">Fashio</a>
                                            <a href="#">Clothing</a>
                                            <a href="#">Hats</a>
                                            <a href="#">Accessories</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                {{-- <p>Showing 1–12 of 126 results</p> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex justify-content-end align-items-center">
                            <div class="shop__product__option__right">
                                <p>Xắp xếp theo:</p>
                                <select>
                                    <option value="">Giá thấp nhất</option>
                                    <option value="">Giá thấp nhất</option>
                                    <option value="">Sản phẩm mới nhất</option>
                                    <option value="">Sản phẩm cũ nhất</option>
                                </select>
                            </div>
                            <div class="shop__product__option__right" style="margin-left: 12px">
                                <p>Hiển thị :</p>
                                <select>
                                    <option value="">12</option>
                                    <option value="">24</option>
                                    <option value="">36</option>
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
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">21</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module" src="{{ asset('customer/js/list-products.js') }}"></script>

    <script></script>
@endsection
