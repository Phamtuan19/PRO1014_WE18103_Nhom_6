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
            <input type="text" value="" placeholder="Nhập tên sản phẩm để tìm kiếm ...." />
            <button type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="header__register header__cart">

            <div class="header__cart-item">
                <div class="header-nav__icon">
                    <a href="{{ route('shopping/cart') }}">
                        <span class="cart-total__quantity">0</span>
                        <i class="fa-solid fa-cart-shopping header-icons"></i>
                    </a>
                    <div class="cart-modal-overlay">
                        <div class="cart-modal">
                            <h1 class="cart-is-empty">Giỏ hàng trống</h1>

                            <div class="product-rows"></div>
                            <div class="total">
                                <h1 class="cart-total">Tổng</h1>
                                <span class="total-price">$0</span>
                                <!-- <button class="purchase-btn">Đặt hàng</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header__register-item">
                <div class="header-nav__icon">
                    <i class="fa-solid fa-user header-icons"></i>
                </div>
                <div class="register__title d-none">
                    @if (Auth::guard('customers')->check())
                        <a href="#">
                            {{ Auth::guard('customers')->user()->name }}
                        </a>
                        <div>
                            <a href="{{ route('customer.logout') }}" class="login-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a href="#">
                            Đăng ký
                        </a>
                        <a href="{{ route('customer.login') }}" class="header-login">
                            Đăng nhập
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="header-with-menu">
        <ul>
            <li class="menu-child active">
                <a href="#">Sàn sách in</a>
            </li>
            <li class="menu-child">
                <a href="#">Sách điện tử</a>
            </li>
            <li class="menu-child">
                <a href="#">Sàn giao dịch bản quyền </a>
            </li>
            <li class="menu-child">
                <a href="#">Gian hàng sách</a>
            </li>
            <li class="menu-child">
                <a href="#">Các cơ sở thông tin và truyền thông</a>
            </li>
            <li class="menu-child">
                <a href="#">Đại sứ thắp lửa</a>
                <ul class="sub-menu">
                    <li class="sub-menu__li"><a class="sub-menu__a" href="#">Đại sứ thắp lửa Jimmii Nguyễn</a></li>
                    <li class="sub-menu__li"><a class="sub-menu__a" href="#">Đại sứ thắp lửa Jimmii Nguyễn</a></li>
                    <li class="sub-menu__li"><a class="sub-menu__a" href="#">Đại sứ thắp lửa Jimmii Nguyễn</a></li>
                </ul>
            </li>
            <li class="menu-child">
                <a href="#">Nhà tài trợ</a>
            </li>
            <li class="menu-child">
                <a href="#">Tin tức - Sự kiện</a>
            </li>
            <li class="menu-child">
                <a href="#">Sách đã xem</a>
            </li>
        </ul>
    </div>
</div>
