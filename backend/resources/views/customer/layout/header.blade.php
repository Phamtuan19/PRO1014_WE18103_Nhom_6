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
                            <h6 class="cart-is-empty">Giỏ hàng trống</h6>

                            <div class="product-rows"></div>
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
        <ul class="nav-categories">
        </ul>
    </div>
</div>
