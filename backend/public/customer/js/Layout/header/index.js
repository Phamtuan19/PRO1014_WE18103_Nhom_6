

import { serviceApi, enpointUrl } from '../../service/index.js';
import { cartItem, renderTotalCard } from '../../render/index.js';

renderTotalCard()

document.querySelector(".header__cart-item").onmouseover = () => {

    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
    if (localCart.length > 0) {
        let listProductCode = localCart.map(e => e.code).join(',');

        serviceApi.getShoppingCart(listProductCode)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                console.log(data);
                const cartMini = document.querySelector(".product-rows");
                cartItem(data, cartMini)
                document.querySelector(".cart_quantity_total").innerText = localCart.length

            })
    } else {
        const cartMini = document.querySelector(".cart-modal");
        cartMini.innerHTML = '<h6 class="cart-is-empty">Giỏ hàng trống</h6>'
    }
}

const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : null;
const register__title = document.querySelector(".register__title");

console.log(register__title);
if (authUser !== null) {
    register__title.innerHTML = `
        <a href="#"> Thông tin tài khoản </a>
        <div>
            <a href="#" class="logout-link"> Đăng xuất </a>
        </div>
    `
    handleLogout(authUser)

} else {
    register__title.innerHTML = `
    <a href="#"> Đăng ký </a>
    <a href="${enpointUrl.login}" class="header-login"> Đăng nhập </a>
    `
}

function handleLogout(data) {
    const logout = document.querySelector(".logout-link");
    // console.log(authUser.token);
    logout.onclick = (event) => {
        event.preventDefault();
        serviceApi.postLogout(authUser.token)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                localStorage.removeItem('authUser');
            })
            .catch(function (error) {
                console.log(error);
            })
    }
}

