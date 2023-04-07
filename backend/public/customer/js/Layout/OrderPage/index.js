
/*
*
*   Page order
*
*/


import { serviceApi, enpointUrl } from '../../service/index.js';
import { handleClickSubmit, handleBlur } from "./validation/index.js";
import { apiProvinces } from '../../render/index.js'
import renderItem from './product-item/index.js';

// ===================================
apiProvinces()
const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : null;

if (authUser !== null) {
    document.querySelector('.order_name').dataset.userid = authUser.user.id;
    document.querySelector('.order_name').value = authUser.user.name;
    document.querySelector('.order_phone').value = authUser.user.phone;
    document.querySelector('.order_email').value = authUser.user.email;
}


const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
let listProductCode = localCart.map(e => e.code).join(',');

if (localCart.length > 0) {
    // call api render product item
    serviceApi.getShoppingCart(listProductCode)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            renderItem(data)
        })
        .catch(function (error) {
            console.log(error);
        })

    // handle blur validation
    handleBlur();

    const btnOrder = document.querySelector('#order');
    btnOrder.onclick = () => {
        handleClickSubmit();
    }
} else {
    setTimeout(() => {
        window.location.href = enpointUrl.home;
    }, 10);
}

