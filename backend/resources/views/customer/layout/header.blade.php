<div id="toast">

</div>
<div class="header">
    <div class="container" style="height: 100%">
        <div class="header-with-search">
            <div class="header__logo">
                <a href="{{ route('customer.home') }}">
                    <img src="{{ asset('customer/image/JP-logo.png') }}" alt="" />
                </a>
            </div>


            <div class="header-with-menu">
                <ul class="nav-categories">
                    <li class="nav-categories__li {{ request()->path() == 'trang-chu' ? 'active' : '' }}">
                        <a class="navbar-item__a" href="/trang-chu">
                            Trang chủ
                        </a>
                    </li>
                    <li class="nav-categories__li {{ request()->path() == 'danh-sach-san-pham' ? 'active' : '' }}">
                        <a class="navbar-item__a" href="/danh-sach-san-pham">
                            Sản phẩm
                        </a>
                        <div class="nav-item nav-item__products">
                            <p class="nav-item__li">
                                <a class="nav-item__li__a" href="/danh-sach-san-pham?danh-muc=sach-chinh-tri-phap-luat">
                                    Sách Chính trị - pháp luật
                                </a>
                            </p>
                            <p class="nav-item__li">
                                <a class="nav-item__li__a"
                                    href="/danh-sach-san-pham?danh-muc=sach-khoa-hoc-cong-nghe-kinh-te">
                                    Sách Khoa học công nghệ - Kinh tế
                                </a>
                            </p>
                            <p class="nav-item__li">
                                <a class="nav-item__li__a" href="/danh-sach-san-pham?danh-muc=sach-van-hoc-nghe-thuat">
                                    Sách Văn học nghệ thuật
                                </a>
                            </p>
                            <p class="nav-item__li">
                                <a class="nav-item__li__a" href="/danh-sach-san-pham?danh-muc=sach-giao-trinh">
                                    Sách Giáo trình
                                </a>
                            </p>
                            <p class="nav-item__li">
                                <a class="nav-item__li__a" href="/danh-sach-san-pham?danh-muc=sach-truyen-tieu-thuyet">
                                    Sách Truyện, tiểu thuyết
                                </a>
                            </p>
                            <p class="nav-item__li">
                                <a class="nav-item__li__a"
                                    href="/danh-sach-san-pham?danh-muc=sach-tam-ly-tam-linh-ton-giao">
                                    Sách Tâm lý, tâm linh, tôn giáo
                                </a>
                            </p>
                            {{-- <p class="nav-item__li">
                                <a class="nav-item__li__a" href="/danh-sach-san-pham?danh-muc=sach-truyen-tieu-thuyet">
                                    Sách Sách thiếu nhi
                                </a>
                            </p> --}}

                        </div>
                    </li>

                    <li class="nav-categories__li {{ request()->path() == 'bai-viet' ? 'active' : '' }}">
                        <a class="navbar-item__a" href="/bai-viet">
                            Bài viết
                        </a>
                    </li>
                    <li class="nav-categories__li {{ request()->path() == 'lien-he' ? 'active' : '' }}">
                        <a class="navbar-item__a" href="/lien-he">
                            Liên Hệ
                        </a>
                    </li>
                    <li class="navbar nav-categories__li {{ request()->path() == 'chinh-sach-quy-dinh' ? 'active' : '' }}">
                        <a class="navbar-item__a" href="#">
                            Chính sách & Quy định
                        </a>
                        <div class="nav-item">
                            <p class="nav-item__li">
                                <a class="nav-item__li__a" href="/chinh-sach-quy-dinh?atc=bao-mat-thong-tin">Bảo mật
                                    thông
                                    tin</a>
                            </p>
                            <p class="nav-item__li">
                                <a class="nav-item__li__a" href="/chinh-sach-quy-dinh?atc=huong-dan-mua-hang">Hướng dẫn
                                    mua
                                    hàng</a>
                            </p>
                            <p class="nav-item__li">
                                <a class="nav-item__li__a" href="/chinh-sach-quy-dinh?atc=chinh-sach-kiem-hang">Chính
                                    sách
                                    kiểm
                                    hàng</a>
                            </p>
                            <p class="nav-item__li">
                                <a class="nav-item__li__a" href="/chinh-sach-quy-dinh?atc=chinh-sach-doi-tra">Chính sách
                                    đổi
                                    trả</a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="header__register header__cart ">
                <div class="header__search">

                    <i class="fa-solid fa-magnifying-glass header-icons"></i>

                </div>
                <div class="header__cart-item">
                    <div class="header-nav__icon">
                        <a href="{{ route('shopping/cart') }}">
                            <span class="cart-total__quantity">0</span>
                            <i class="fa-solid fa-cart-shopping header-icons"></i>
                        </a>
                        <div class="cart-modal-overlay">
                            <div class="cart-modal">
                                <h6 class="cart-is-empty">Có
                                    <span class="cart_quantity_total"> </span>
                                    sản phẩm trong giỏ hàng
                                </h6>
                                <div class="product-rows">
                                </div>
                                <div class="total">
                                    <span class="cart-total">Tổng</span>
                                    <span class="total-price">$0</span>
                                </div>
                                <a href="http://127.0.0.1:8000/shopping/cart" class="purchase-btn">Đi đến giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header__register-item">
                    <div class="header-nav__icon user__active">
                        {{-- <i class="fa-solid fa-right-to-bracket  header-icons" style="transform: rotate(180deg);"></i> --}}
                        {{-- <i class="fa-solid fa-user header-icons"></i> --}}
                    </div>
                    <div class="register__title" style="padding: 8px 24px">


                    </div>
                </div>
            </div>
            <div class="header_input_search d-none">
                <div class="header_input_search__box">
                    <input type="text" class="input__search" value="" placeholder="Nhập tên sản phẩm để tìm kiếm ...." />
                    <i class="fa-solid fa-magnifying-glass header-icons header_input_search_icon"></i>
                    <div class="header__search__list__item d-none">
                        <div class="header__search__content">

                        </div>
                        <div class="header__search__redirect">

                        </div>
                    </div>
                </div>
                <div class="header_input_search__close">
                    <i class="fa-regular fa-circle-xmark"></i>
                </div>
            </div>
        </div>
    </div>
</div>
