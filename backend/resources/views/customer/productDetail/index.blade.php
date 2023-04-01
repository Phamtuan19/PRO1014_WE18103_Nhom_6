@extends('customer.layout.index')
@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/productDetail.css') }}">
@endsection
@section('contents')
    <div class="container-ct" id="container-ct">
        {{-- <div class="breadcrumb">
            <div class="breadcrumb-bound">
                <ul class="breadcrumb-navigation">
                    <li><a href="#" title="Trang chủ">Trang chủ</a></li>
                    <li><span>&nbsp;&nbsp;&gt;&nbsp;&nbsp;</span></li>
                    <li><a href="#" title="Sách In ">Sách In </a></li>
                    <li><span>&nbsp;&nbsp;&gt;&nbsp;&nbsp;</span></li>
                    <li><a href="#" title="Sách dành cho giới trẻ">Sách dành cho giới trẻ</a></li>
                    <li><span>&nbsp;&nbsp;&gt;&nbsp;&nbsp;</span></li>
                    <li><a href="#" title="Kỹ năng sống">Kỹ năng sống</a></li>

                </ul>
            </div>
        </div> --}}

        <div class="detail">
            <div class="detail-box1">
                <div class="detail-box1_img">
                    <div class="slideshow">
                        <a class="prev next_lr">❮</a>
                        <img src="" width="350" alt="" srcset="" class="image_product__detail" />
                        <a class="next next_lr">❯</a>
                    </div>
                </div>

                <div class="detail-introduce">
                    <h3>Giới thiệu sách</h3>
                </div>

                <div class="detail-box1_describe">
                    <div>
                        {{ $product->introduction }}
                    </div>
                </div>
            </div>

            <div class="detail-box2">
                <div class="detail-box2_content">
                    <div class="detail2-title">
                        <h3>{{ $product->name }}</h3>
                    </div>
                    {{-- @dd($product->categories) --}}
                    <div class="detail2-author">
                        <p>Tác giả: <a href="#">{{ $product->author->name }} </a></p>
                        <p>Lĩnh vực: <a href="#">{{ $product->categories->name }}</a></p>
                        <p>Nhà xb: <a href="#">{{ $product->publishing_house->name }}</a></p>
                    </div>
                    <span class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;(0 đánh giá)
                        <a href="#">Click để đánh giá</a>
                    </span>
                    <div class="detail2-price">
                        <p class="detail2-price__reduced" data-price="{{ $product->detail->price }}">
                            {{ $product->detail->price }}đ</p>
                        <del class="detali2-price__original"
                            data-sale="{{ $product->detail->promotion_price }}">{{ $product->detail->promotion_price }}đ</del>
                    </div>

                    <p class="transport">Giảm 30% phí vận chuyển bởi Nhất Tín Express(NTX)</p>
                    <div class="detail2-status">
                        {{-- <p class="status">Tình trạng: <span>{{ $product->warehouses->quantity_stock > 0 ||  ? 'Còn hàng': 'Hết hàng' }}</span></p> --}}
                    </div>

                    <div class="detail2-buy">
                        <button type="button" class="" value="Mua ngay">
                            <i class="bi bi-currency-dollar"></i>
                            Mua ngay
                        </button>
                        <button class="buy2 add-to__cart btn btn--success" data-id="{{ $product->id }}"
                            data-code="{{ $product->product_code }}">
                            Cho vào giỏ hàng
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user">
        <div class="user-title">
            <h3>BÌNH LUẬN</h3>
        </div>
        <div class="user-form">
            <form action="">
                <div class="form-group">
                    <textarea name="" id="" placeholder="Nhập nội dung bình luận (tiếng Việt có dấu)..."></textarea>
                    <button type="submit" class="user-button">GỬI BÌNH LUẬN</button>
                </div>
            </form>
        </div>
        <div class="user-wrapper">
            <div class="user-avatar">
                <img src="/fondend/phungps24202/assets/image/avatar-facebook-doc.jpg" alt="User Avatar" />
            </div>
            <div class="comment-body">
                <h4 class="comment-user">John Doe</h4>
                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
                <span class="comment-time">2 hours ago</span>
            </div>
        </div>
        <div class="user-wrapper">
            <div class="user-avatar">
                <img src="/fondend/phungps24202/assets/image/avatar-facebook-doc.jpg" alt="User Avatar" />
            </div>
            <div class="comment-body">
                <h4 class="comment-user">John Doe</h4>
                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
                <span class="comment-time">2 hours ago</span>
            </div>
        </div>
        <div class="related-title">
            <h2>Sách Cùng Lĩnh Vực</h2>
        </div>
        <div class="related-book">
            <div class="product">
                <div class="product-img">
                    <img class="image"
                        src="https://th.bing.com/th/id/OIP.qWOnNYv8xJF0P_JApoPZjAHaHE?w=174&h=184&c=7&r=0&o=5&pid=1.7"
                        width="100%" alt="" />
                </div>
                <div class="product-title">
                    <a class="product-name">Lời thú tội mới của một sát thủ kinh tế</a>
                    <a class="product-author"> John Perkins</a>
                    <div class="product-price">
                        <p class="product-price__reduced">100.000 đ</p>
                        <del class="product-price__original">150.000 đ</del>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module" src="{{ asset('customer/js/productDetail.js') }}"></script>

    <script></script>
@endsection
