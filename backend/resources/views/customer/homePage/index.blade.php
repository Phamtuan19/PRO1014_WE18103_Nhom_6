@extends('customer.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/homepage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection

@section('contents')
    <div class="page-main">
        <div class="home-page">
            <div class="slider">
                <div class="">
                    <div class="next"></div>
                    <div class="prev"></div>
                </div>
                <div class="slides">
                    <div class="slide first">
                        <img class="image_product__detail" src="https://book365.vn/upload/resize_cache/iblock/4f0/950_290_1/4f0558744f4e4797ee554882fdaae33c.jpg"
                            alt="" />
                    </div>
                </div>
                <div class="navigation-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                </div>
            </div>
        </div>

        <div class="home-item">
            <div class="home__title">
                <span class="home__title__text active" data-filter="bestseller">Bán chạy nhất</span>
                <span class="home__title__text" data-filter="newest">Mới nhất</span>
                <span class="home__title__text" data-filter="bestPrice">Giá tốt nhất</span>
            </div>
            <div class="container-fluid">
                <div class="row product-sale__test">
                    {{-- API Render --}}
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="product__title">
                <span class="product__title__text active" style="margin: 0;">Gợi ý cho bạn</span>
            </div>
            <div class="row product-list__test">
            </div>
        </div>

        <div class="container-fluid">
            <div class="row" style="padding-bottom: 24px;">
                <div class="col-12 product__title">
                    <span class="product__title__text active" style="margin: 0; background-color: #fff">Bài viết nổi
                        bật</span>
                </div>

                <div class="col-4 " style="">
                    <div class="post_items">
                        <a href="" style="color: #111111;">
                            <div class=" set-bg"
                                style="width: 100%;height: 200px; background-image: url('https://book365.vn/upload/resize_cache/iblock/4f0/950_290_1/4f0558744f4e4797ee554882fdaae33c.jpg');">
                            </div>
                            <div class="">
                                <h5 class="post_item_name">Bài dự thi Viết cảm nhận về một cuốn sách mà em yêu thích (25
                                    mẫu)
                                </h5>
                                <p class="introduction">Đọc sách là một trong những cách giúp bạn học thêm nhiều thứ về cuộc
                                    sống,
                                    những trải nghiệm mà có thể bạn chưa từng có. Đây cũng là thói quen tìm thấy ở rất nhiều
                                    người
                                    thành công. Sau đây Hải Triều sẽ review TOP những cuốn sách hay nên đọc nhất mọi thời
                                    đại.
                                </p>
                                <div class="post_item__detail">
                                    <p class="post_item_author">Admin</p>
                                    <p class="post_item_created_at">2023-04-12 17:06:03</p>
                                    <p class="post_item_created_view">view: 12</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-4 " style="">
                    <div class="post_items">
                        <a href="" style="color: #111111;">
                            <div class=" set-bg"
                                style="width: 100%;height: 200px; background-image: url('https://book365.vn/upload/resize_cache/iblock/4f0/950_290_1/4f0558744f4e4797ee554882fdaae33c.jpg');">
                            </div>
                            <div class="">
                                <h5 class="post_item_name">Bài dự thi Viết cảm nhận về một cuốn sách mà em yêu thích (25
                                    mẫu)
                                </h5>
                                <p class="introduction">Đọc sách là một trong những cách giúp bạn học thêm nhiều thứ về cuộc
                                    sống,
                                    những trải nghiệm mà có thể bạn chưa từng có. Đây cũng là thói quen tìm thấy ở rất nhiều
                                    người
                                    thành công. Sau đây Hải Triều sẽ review TOP những cuốn sách hay nên đọc nhất mọi thời
                                    đại.
                                </p>
                                <div class="post_item__detail">
                                    <p class="post_item_author">Admin</p>
                                    <p class="post_item_created_at">2023-04-12 17:06:03</p>
                                    <p class="post_item_created_view">view: 12</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-4 " style="">
                    <div class="post_items">
                        <a href="" style="color: #111111;">
                            <div class=" set-bg"
                                style="width: 100%;height: 200px; background-image: url('https://book365.vn/upload/resize_cache/iblock/4f0/950_290_1/4f0558744f4e4797ee554882fdaae33c.jpg');">
                            </div>
                            <div class="">
                                <h5 class="post_item_name">Bài dự thi Viết cảm nhận về một cuốn sách mà em yêu thích (25
                                    mẫu)
                                </h5>
                                <p class="introduction">Đọc sách là một trong những cách giúp bạn học thêm nhiều thứ về cuộc
                                    sống,
                                    những trải nghiệm mà có thể bạn chưa từng có. Đây cũng là thói quen tìm thấy ở rất nhiều
                                    người
                                    thành công. Sau đây Hải Triều sẽ review TOP những cuốn sách hay nên đọc nhất mọi thời
                                    đại.
                                </p>
                                <div class="post_item__detail">
                                    <p class="post_item_author">Admin</p>
                                    <p class="post_item_created_at">2023-04-12 17:06:03</p>
                                    <p class="post_item_created_view">view: 12</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script type="module" src="{{ asset('customer/js/Layout/HomePage/index.js') }}"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 24,
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endsection
