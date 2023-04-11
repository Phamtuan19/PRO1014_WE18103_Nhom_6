

/*
*
*   Shopping page
*
*/


import { serviceApi, enpointUrl } from '../../service/index.js';
import { shoppingCart, cartTotalsMoney } from '../../render/index.js';
import { hendleClickQuantity } from '../../handle/index.js';

export function runShoppingCart() {
    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

    // console.log();
    if (localCart.length > 0) {
        let listProductCode = localCart.map(e => e.code).join(',');

        serviceApi.getShoppingCart(listProductCode)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                shoppingCart(data, localCart);
                cartTotalsMoney()
                hendleClickQuantity()
            })
        // .catch(function (error) {
        //     console.log(error);
        // })
    } else {
        // document.querySelector('.cart-table_body').innerHTML = ''
    }
}

runShoppingCart()

