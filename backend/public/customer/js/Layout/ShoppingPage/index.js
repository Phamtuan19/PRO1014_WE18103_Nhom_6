

/*
*
*   Shopping page
*
*/


import { serviceApi, enpointUrl } from '../../service/index.js';
import { shoppingCart, cartTotalsMoney, apiProvinces } from '../../render/index.js';
import { hendleClickQuantity } from '../../handle/index.js';
import { handleClickSubmit, handleBlur } from './validation/index.js';



export function runShoppingCart() {
    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
    const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : null;
    if (localCart.length > 0) {
        if (authUser !== null) {
            document.querySelector('.order_name').dataset.userid = authUser.user.id;
            document.querySelector('.order_name').value = authUser.user.name;
            document.querySelector('.order_phone').value = authUser.user.phone;
            document.querySelector('.order_email').value = authUser.user.email;
        }

        handleBlur()

        let listProductCode = localCart.map(e => e.code).join(',');
        rederProductsItem(listProductCode);

        document.querySelector('.checkout-button').onclick = (event) => {
            event.preventDefault();
            handleClickSubmit();
        }
    }
    // else {
    //     document.querySelector('.cart-table_body').innerHTML = '<td>không có sản phẩm nào</td>'
    // }
}

function rederProductsItem(listProductCode) {
    serviceApi.getShoppingCart(listProductCode)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            shoppingCart(data);
            cartTotalsMoney()
            hendleClickQuantity()
            apiProvinces();
        })
        .catch(function (error) {
            console.log(error);
        })
}

runShoppingCart()

