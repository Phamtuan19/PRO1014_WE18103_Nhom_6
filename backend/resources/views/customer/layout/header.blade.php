<div id="toast">

</div>
<div class="header">
    <div class="header-with-search">
        <div class="header__logo">
            <a href="{{ route('customer.home') }}">
                <img src="https://bookbuy.vn/Images/frontend/base/logo-new.png" alt="" />
            </a>
        </div>
        <div class="header__search">
            <input type="text" class="input__search" value="" placeholder="Nhập tên sản phẩm để tìm kiếm ...." />
            <button type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <div class="header__search__list__item d-none">

            </div>
        </div>
        <div class="header__register header__cart ">

            <div class="header__cart-item">
                <div class="header-nav__icon">
                    <a href="{{ route('shopping/cart') }}">
                        <span class="cart-total__quantity">0</span>
                        <i class="fa-solid fa-cart-shopping header-icons"></i>
                    </a>
                    <div class="cart-modal-overlay">
                        <div class="cart-modal">
                            <h6 class="cart-is-empty">Có <span class="cart_quantity_total"></span> sản phẩm trong giỏ
                                hàng</h6>
                            <div class="product-rows">
                            </div>
                            <div class="total">
                                <span class="cart-total">Tổng</span>
                                <span class="total-price">$0</span>
                            </div>
                            <a href="" class="purchase-btn">Đi đến giỏ hàng</a>
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
    </div>
    <div class="header-with-menu">
        <ul class="nav-categories">
            <li class="nav-categories__li">
                <a class="navbar-item__a" href="trang-chu">
                    Trang chủ
                </a>
            </li>
            <li class="nav-categories__li">
                <a class="navbar-item__a" href="danh-sach-san-pham">
                    Sản phẩm
                </a>
            </li>

            <li class="nav-categories__li">
                <a class="navbar-item__a" href="bai-viet">
                    Bài viết
                </a>
            </li>
            <li class="nav-categories__li">
                <a class="navbar-item__a" href="lien-he">
                    Liên Hệ
                </a>
            </li>
            <li class="navbar nav-categories__li">
                <a class="navbar-item__a" href="#">
                   Chính sách & Quy định
                </a>
                <ul class="nav-item">
                    <li class="nav-item__li">
                        <a class="nav-item__li__a" href="chinh-sach-quy-dinh?atc=bao-mat-thong-tin">Bảo mật thông tin</a>
                    </li>
                    <li class="nav-item__li">
                        <a class="nav-item__li__a" href="chinh-sach-quy-dinh?atc=huong-dan-mua-hang">Hướng dẫn mua hàng</a>
                    </li>
                    <li class="nav-item__li">
                        <a class="nav-item__li__a" href="chinh-sach-quy-dinh?atc=chinh-sach-kiem-hang">Chính sách kiểm hàng</a>
                    </li>
                    <li class="nav-item__li">
                        <a class="nav-item__li__a" href="chinh-sach-quy-dinh?atc=chinh-sach-doi-tra">Chính sách đổi trả</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
