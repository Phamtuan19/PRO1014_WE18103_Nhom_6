
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

windowLoading();
renderTotalCard()


// Render CartMini
document.querySelector(".header__cart-item").onmouseover = () => {
    let localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
    const cartMini = document.querySelector(".product-rows");
    cartItem(cartMinidata, cartMini)
    document.querySelector(".cart_quantity_total").innerText = localCart.length

    //     const cartMini = document.querySelector(".cart-modal");
    //     cartMini.innerHTML = '<h6 class="cart-is-empty">Giỏ hàng trống</h6>'
}


// Đăng xuất
function handleCheckLogin() {
    const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : null;
    const register__title = document.querySelector(".register__title");

    if (authUser !== null) {
        register__title.innerHTML = `
            <a href="${enpointUrl.userInfo}"> Thông tin tài khoản </a>
            <div>
                <a href="${baseUrl} + "customer/logout" class="logout-link"> Đăng xuất </a>
            </div>
        `
        handleLogout(authUser)

    } else {
        register__title.innerHTML = `
        <a href="#"> Đăng ký </a>
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
                    middlewareAuth();
                }, 1500)
            })
            .catch(function (error) {
                console.log(error);
            })
    }
}

