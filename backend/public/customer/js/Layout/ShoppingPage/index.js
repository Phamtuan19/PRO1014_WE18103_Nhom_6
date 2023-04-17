

/*
*
*   Shopping page
*
*/


import { serviceApi, enpointUrl } from '../../service/index.js';
import { shoppingCart, cartTotalsMoney, apiProvinces } from '../../render/index.js';
import { hendleClickQuantity } from '../../handle/index.js';
import { handleClickSubmit, handleBlur } from './validation/index.js';
import valiBtnDiscountCode from './discount-code/index.js'
import { showErrorToast } from '../../message/index.js';



function runShoppingCart() {
    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
    const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : null;
    if (localCart.length > 0) {
        if (authUser) {
            document.querySelector('.order_name').dataset.userid = authUser.user.id;
            document.querySelector('.order_name').value = authUser.user.name;
            document.querySelector('.order_phone').value = authUser.user.phone;
            document.querySelector('.order_email').value = authUser.user.email;
        }

        handleBlur()

        let listProductCode = localCart.map(e => e.code).join(',');
        rederProductsItem(listProductCode);
        // console.log(listProductCode);
        if (document.querySelector('.checkout-button')) {
            document.querySelector('.checkout-button').onclick = (event) => {
                event.preventDefault();
                if(authUser){
                    handleClickSubmit();
                }else {
                    showErrorToast('Yêu cầu đăng nhập tài khoản vào cửa hàng!')
                }
            }
        }
    }
    else {
        if (document.querySelector('.shopping_page')) {
            document.querySelector('.shopping_page').innerHTML = '<h5 style="text-align: center; margin: 30px 0 200px 0;">không có sản phẩm nào</h5>'
        }
    }
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

if (window.location.href === enpointUrl.shoppingCart) {
    runShoppingCart()
}

valiBtnDiscountCode();

export default runShoppingCart

