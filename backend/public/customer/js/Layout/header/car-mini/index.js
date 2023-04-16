

/*
*
*   Render && Call API Cart Mini
*
*/

import { serviceApi } from '../../../service/index.js';
import { formatCurrency } from '../../../method/index.js';


let cartMinidata;

callApiMiniCart();

function callApiMiniCart() {
    let localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
    if (localCart.length > 0) {

        let listProductCode = localCart.map(e => e.code).join(',');

        serviceApi.getShoppingCart(listProductCode)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                cartMinidata = data;
                totalMoneyCartMini(cartMinidata);
            })
    } else {
        cartMinidata = [];
    }
}

function totalMoneyCartMini(carMinidata) {
    if (cartMinidata.length > 0) {
        const total = carMinidata.reduce((init, currentValue) => {
            if (currentValue.promotion_price) {
                return init + currentValue.promotion_price;
            } else {
                return init + currentValue.price;
            }
        }, 0)
        document.querySelector(".total-price").innerText = formatCurrency(total);
    }
}



export default callApiMiniCart;
export {cartMinidata};
