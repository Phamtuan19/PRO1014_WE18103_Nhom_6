@extends('customer.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/homepage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
@endsection

@section('contents')
    <div class="page-main">
        <div class="home-page">
            <div class="slider">
                <div class="slides">
                    <input type="radio" name="radio-btn" id="radio1" value="" />
                    <input type="radio" name="radio-btn" id="radio2" value="" />
                    <input type="radio" name="radio-btn" id="radio3" value="" />

                    <div class="slide first">
                        <img src="https://book365.vn/upload/resize_cache/iblock/4f0/950_290_1/4f0558744f4e4797ee554882fdaae33c.jpg"
                            alt="" />
                    </div>
                    <div class="slide">
                        <img src="https://book365.vn/upload/resize_cache/iblock/62c/950_290_1/62ca20282dc5fe64b2ce32480f1523e4.png"
                            alt="" />
                    </div>
                    <div class="slide">
                        <img src="https://book365.vn/upload/resize_cache/iblock/59c/950_290_1/59cb7d6365c2cc89ece83671d912638b.jpg"
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

        <div class="banner">
            <img src="https://book365.vn/upload/iblock/669/6696dbbd088e57488296cca11766025c.jpg" alt="" />
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
