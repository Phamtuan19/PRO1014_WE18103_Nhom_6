<div id="toast">

</div>
<div class="header" >
    <div class="header-with-search">
        <div class="header__logo">
            <a href="#">
                <img src="https://bookbuy.vn/Images/frontend/base/logo-new.png" alt="" />
            </a>
        </div>
        <div class="header__search">
            <input type="text" />
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
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @else
                        <a href="#">
                            Đăng ký
                        </a>
                        <a href="#" class="header-login">
                            Đăng nhập
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="header-with-menu">
        <ul class="navbar-menu">

        </ul>
    </div>
</div>
