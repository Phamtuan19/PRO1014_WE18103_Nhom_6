
/*
*
*   Header.
*
*/

import { showErrorToast, showSuccessToast } from '../../message/index.js';
import { serviceApi, enpointUrl, baseUrl } from '../../service/index.js';
import { cartItem, renderTotalCard } from '../../render/index.js';
import { windowLoading } from '../../message/index.js';
import { cartMinidata } from './car-mini/index.js';
import middlewareAuth from '../../Middleware/index.js';
import { formatCurrency } from '../../method/index.js';

windowLoading();
renderTotalCard()

// Render CartMini
document.querySelector(".header__cart-item").onmouseover = () => {
    let localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
    const cartMini = document.querySelector(".product-rows");
    if (localCart.length > 0) {
        cartItem(cartMinidata, cartMini)
        document.querySelector(".cart_quantity_total").innerText = localCart.length
    } else {
        const cartMini = document.querySelector(".cart-modal");
        cartMini.innerHTML = '<h6 class="cart-is-empty">Giỏ hàng trống</h6>'
    }
}


// Đăng xuất
function handleCheckLogin() {
    const authUser = JSON.parse(localStorage.getItem('authUser'));
    const register__title = document.querySelector(".register__title");
    const user__active = document.querySelector(".user__active");

    if (authUser) {
        user__active.innerHTML = `<i class="fa-solid fa-user header-icons"></i>`
        register__title.innerHTML = `
            <div class="user_menu">
                <div class="user_menu_image" style="background-image: url(https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSfjRp8wZGknTyJrPQP2T7qoPw0t-TyR_moh990W9PgBfDb7jxP)"></div>
                <div class="user_menu_info">
                    <span class="user_menu_name">${authUser.user.name}</span>
                    <span class="user_menu_email">${authUser.user.email}</span>
                </div>
            </div>
            <a href="${enpointUrl.userInfo}"> Thông tin tài khoản </a>
            <a href="http://127.0.0.1:8000/san-pham-da-mua"> Sản phẩm đã mua </a>

            <div>
                <a href="#" class="logout-link"> Đăng xuất </a>
            </div>
        `
        handleLogout(authUser)

    } else {
        user__active.innerHTML = `<i class="fa-solid fa-right-to-bracket  header-icons" style="transform: rotate(180deg);"></i>`
        register__title.innerHTML = `
        <a href="${enpointUrl.register}"> Đăng ký </a>
        <a href="${enpointUrl.login}" class="header-login"> Đăng nhập </a>
        `
    }
}

handleCheckLogin()

function handleLogout(authUser) {
    const logout = document.querySelector(".logout-link");

    logout.onclick = (event) => {
        event.preventDefault();
        serviceApi.postLogout(authUser.token)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                console.log(data);
                localStorage.removeItem('authUser');
                handleCheckLogin()
                showSuccessToast("Đăng Xuất thành công!")
                setTimeout(() => {
                    // middlewareAuth();
                    location.reload();
                }, 1500)
            })
            .catch(function (error) {
                console.log(error);
            })
    }
}

const input__search = document.querySelector(".input__search");

input__search.addEventListener('focus', () => {
    document.querySelector('.header__search__list__item').classList.remove('d.none')

    input__search.onkeyup = () => {

        fetch('http://127.0.0.1:8000/api/search?q=' + input__search.value)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                renderSearch(data);
            })
    }
})

function renderSearch(data) {

    document.querySelector('.header__search__list__item').innerHTML = data.map(e => {
        return `
            <a href="${enpointUrl.productDetail(e.product_code)}" class="header__search_product__item">
                <div class="item__image set-bg"
                    style="background-image: url('${e.image_url}');">
                </div>
                <div class="item__detail">
                    <p class="item__detail__name">${e.name}</p>
                    <p class="item__detail__author">
                        <span>Tác giả:</span>
                        ${e.author_name}
                    </p>
                    <div class="cart-item__price">
                        <p class="item__price__original" data-sale="${e.price}">${formatCurrency(e.price)}</p>
                        <p class="item__price" data.price="${e.promotion_price}">${formatCurrency(e.promotion_price)}</p>
                    </div>
                </div>
            </a>
        `
    }).join('')
}
