

import { serviceApi } from '../../service/index.js';
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



// function renderCartMiniTotalMoney() {
//     const price_sale = document.querySelectorAll(".item__price__original");
//     const price = document.querySelectorAll(".item__price ");
//     const quantity = document.querySelectorAll(".item__quantity ");

//     const total__money = 0

//     let a = quantity.forEach((e, index) => {
//         let total = 0;
//         let money =  Number(price_sale[index].dataset.sale) * Number(quantity[index].dataset.quantity)

//         document.querySelector(".total-price").innerText = formatCurrency(total + money)
//     });

//     console.log(a);

//     // document.querySelector(".total-price").innerText = formatCurrency(total)
// }

