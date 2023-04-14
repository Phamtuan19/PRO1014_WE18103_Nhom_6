@extends('customer.layout.index')

@section('link')
    <link rel="stylesheet" href="{{ asset('customer/css/homepage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            width: 100%;
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            /* object-fit: cover; */
        }
    </style>
@endsection

@section('contents')
    <div class="container-fluid" style="background-color: #fff">
        <div class="row">
            <div class="col-12" style="height: 500px; padding: 0;">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="https://www.vinabook.com/images/thumbnails/promo/802x480/363192_tpchpitp6s121.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://www.vinabook.com/images/thumbnails/promo/802x480/363501_bschehon.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://www.vinabook.com/images/thumbnails/promo/802x480/363107_thayicucsng.jpg" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://www.vinabook.com/images/thumbnails/promo/802x480/363104_qgkn1.jpg" alt="">
                        </div>
                    </div>
                    {{-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> --}}
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="page-main">
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

                    <div class="container-fluid">
                        <div class="row featured_posts">
                        </div>
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
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
