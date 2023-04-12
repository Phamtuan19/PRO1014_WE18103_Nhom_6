

/*
*
*   Validation Page Order
*
*/


import { validation } from "../../../method/index.js";
import callApiOrder from "../call-api-order/index.js";

const name = document.querySelector(".order_name")
const email = document.querySelector(".order_email")
const phone = document.querySelector(".order_phone")
const province = document.querySelector(".province")
const district = document.querySelector(".district")
const ward = document.querySelector(".ward")
const house_number = document.querySelector(".house_number")
const order_note = document.querySelector(".order_note")
// const btn_order = document.querySelector('#btn__order__confirmation')

function handleBlur() {
    name.onblur = () => {
        validation(['required', 'min|6'], name, 'Tên khách hàng');
    }
    email.onblur = () => {
        validation(['required', 'email'], email, 'email');
    }
    phone.onblur = () => {
        validation(['required', 'phone'], phone, 'Số điện thoại');
    }
    province.onblur = () => {
        validation(['required'], province, 'TỈnh');
    }
    district.onblur = () => {
        validation(['required'], district, 'Huyện');
    }
    house_number.onblur = () => {
        validation(['required'], house_number, 'Xã');
    }
    ward.onblur = () => {
        validation(['required'], ward, 'Số nhà');
    }
}

function handleClickSubmit() {
    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
    // let isCheck = false;
    // const input_radio = document.querySelectorAll(".delivery_form");

    // for (let i = 0; i < input_radio.length; i++) {
    //     if (input_radio[i].checked) {
    //         isCheck = true;
    //         console.log(input_radio[i].dataset.value);
    //         document.querySelector(".error_delivery_form").innerText = "";
    //         break;
    //     } else {
    //         document.querySelector(".error_delivery_form").innerText = "Loại thanh toán không được để trống.";
    //     }
    // }
    if (validation(['required', 'min|6'], name, 'Tên khách hàng') &&
        validation(['required', 'email'], email, 'email') &&
        validation(['required', 'phone'], phone, 'Số điện thoại') &&
        validation(['required'], province, 'TỈnh') &&
        validation(['required'], district, 'Huyện') &&
        validation(['required'], house_number, 'Xã') &&
        validation(['required'], ward, 'Số nhà')) {

        let dataOrder = {
            user_id: $('.order_name').data('userid'),
            name: name.value,
            email: email.value,
            phone: phone.value,
            province_city: province.value,
            county_district: district.value,
            ward: ward.value,
            house_number_street_name: house_number.value,
            content_note: order_note.value,
            products: localCart,
            total_product_quantity: localCart.length,
            payment_form: 'COD',
            discount_code_id: null,
        }
        callApiOrder(dataOrder);
    }
}

export { handleClickSubmit, handleBlur }
