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
                            <h6 class="cart-is-empty">Có <span class="cart_quantity_total"></span> sản phẩm trong giỏ
                                hàng</h6>
                            <div class="product-rows">
                                {{-- <div class="cart-item">
                                    <div class="cart-item__image"
                                        style="background-image: url('');">
                                    </div>
                                    <div class="cart-item__info">
                                        <p class="item__info__name">Nuốt Ngược Nước Mắt Để Trưởng Thành Hơn</p>
                                        <div class="cart-item__price">
                                            <p class="item__price">165.000 ₫</p>
                                            <p class="item__price__original">135.000 ₫</p>
                                        </div>
                                    </div>
                                    <div class="cart-item__quantity">
                                        <span class="item__quantity">1</span>
                                    </div>
                                </div> --}}
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
                <div class="header-nav__icon">
                    <i class="fa-solid fa-user header-icons"></i>
                </div>
                <div class="register__title">

                    

                </div>
            </div>
        </div>
    </div>
    <div class="header-with-menu">
        <ul class="nav-categories">
        </ul>
    </div>
</div>
