import { service } from './service.js';
import { shoppintCart, quantityShoppingCartItem } from './render__Html.js';
import { hendleClickQuantity, cartTotals } from './basie.js';

const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

let listProductCode = localCart.map(e => e.code).join(',');

if (localCart.length > 0) {
    service.getShoppingCart(listProductCode)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            const cartTableBody = document.querySelector('.cart-table_body')
            shoppintCart(data, cartTableBody);
            quantityShoppingCartItem(localCart);
            cartTotals()
            hendleClickQuantity()
        })
        .catch(function (error) {
            console.log(error);
        })
}


