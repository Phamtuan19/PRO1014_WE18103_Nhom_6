

import { serviceApi } from '../../service/index.js';
import { shoppingCart } from '../../render/index.js';
import { showErrorToast, showSuccessToast } from '../../message/index.js';
import { handleClickSubmit, handleBlur } from "./validation/index.js";
import apiProvinces from '../../render/index.js'
// import { hendleClickQuantity, cartTotals, showSuccessToast, showErrorToast } from './basie.js';


apiProvinces()

// ===================================


const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

let listProductCode = localCart.map(e => e.code).join(',');

if (localCart.length > 0) {

    serviceApi.getShoppingCart(listProductCode)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            const elem = document.querySelector('.cart-table_body');
            shoppingCart(data, elem);
            // quantityShoppingCartItem(localCart);
            // cartTotals()
            // hendleClickQuantity()
        })
        .catch(function (error) {
            console.log(error);
        })

    const btnOrder = document.querySelector('#order');
    btnOrder.onclick = () => {

        const name = document.querySelector('.order_name').value;
        const phone = document.querySelector('.order_phone').value;
        const email = document.querySelector('.order_email').value;
        const province = document.querySelector('#province').getAttribute("data-province");
        const district = document.querySelector('#district').getAttribute("data-district");
        const house_number = document.querySelector('#house_number').getAttribute("data-houseNumber");
        const ward = document.querySelector('#ward').getAttribute("data-ward");
        const orderNote = document.querySelector('#order_note').value;

        const delivery_form = document.querySelector('input[name="delivery_form"]:checked').dataset.value;

        let dataOrder = {
            user_id: $('.order_name').data('userid'),
            name: name,
            email: email,
            phone: phone,
            province_city: province,
            county_district: district,
            ward: ward,
            house_number_street_name: house_number,
            content_note: orderNote,
            products: localCart,
            total_product_quantity: localCart.length,
            payment_form: delivery_form,
            discount_code_id: null,
        }

        console.log(dataOrder);

        serviceApi.postOrder(dataOrder)
            .then(function (response) {
                if (response.status !== 200) {
                    showErrorToast("Đã có lỗi xảy ra. Vui lòng kiểm tra lại")
                    throw new Error(response.status);
                }
                showSuccessToast("Đặt hàng thành công");
                return response.json();
            })
            .then(function (data) {
                console.log(data);
                // localStorage.clear();
            })
            .catch(function (error) {
                console.log(error);
            })
    }
}



function callApiOrder() {
    const btnOrder = document.querySelector('#order');
    btnOrder.onclick = () => {
        console.log("order thành công");
        const name = document.querySelector('.order_name').value;
        const phone = document.querySelector('.order_phone').value;
        const email = document.querySelector('.order_email').value;
        const province = document.querySelector('#province').getAttribute("data-province");
        const district = document.querySelector('#district').getAttribute("data-district");
        const house_number = document.querySelector('#house_number').getAttribute("data-houseNumber");
        const ward = document.querySelector('#ward').getAttribute("data-ward");
        const orderNote = document.querySelector('#order_note').value;

        const delivery_form = document.querySelector('input[name="delivery_form"]:checked').value;

        let dataOrder = {
            user_id: $('.order_name').data('userid'),
            name: name,
            email: email,
            phone: phone,
            province_city: province,
            county_district: district,
            ward: ward,
            house_number_street_name: house_number,
            content_note: orderNote,
            products: localCart,
            total_product_quantity: localCart.length,
            payment_form: delivery_form,
            discount_code_id: null,
        }

        serviceApi.postOrder(dataOrder)
            .then(function (response) {
                if (response.status !== 200) {
                    showErrorToast("Đã có lỗi xảy ra. Vui lòng kiểm tra lại")
                    throw new Error(response.status);
                }
                showSuccessToast("Đặt hàng thành công");
                return response.json();
            })
            .then(function (data) {
                console.log(data);
                // localStorage.clear();
            })
            .catch(function (error) {
                console.log(error);
            })
    }
}
