

/*
*
*   Validation Page Order
*
*/


import { validation } from "../../../method/index.js";
import callApiOrder from "../call-api-order/index.js";

const name = document.querySelector(".order_name");
const email = document.querySelector(".order_email");
const phone = document.querySelector(".order_phone");
const province = document.querySelector(".province");
const district = document.querySelector(".district");
const ward = document.querySelector(".ward");
const house_number = document.querySelector(".house_number");
const order_note = document.querySelector(".order_note");
const discountCode = document.querySelector(".discount-code_input");
// const btn_order = document.querySelector('#btn__order__confirmation')

function handleBlur() {

    if (name) {
        name.onblur = () => {
            validation(['required', 'min|6'], name, 'Tên khách hàng');
        }
    }
    if (email) {
        email.onblur = () => {
            validation(['required', 'email'], email, 'email');
        }
    }
    if (phone) {
        phone.onblur = () => {
            validation(['required', 'phone'], phone, 'Số điện thoại');
        }
    }
    if (province) {
        province.onblur = () => {
            validation(['required'], province, 'TỈnh');
        }
    }
    if (district) {
        district.onblur = () => {
            validation(['required'], district, 'Huyện');
        }
    }
    if (house_number) {
        house_number.onblur = () => {
            validation(['required'], house_number, 'Xã');
        }
    }
    if (ward) {
        ward.onblur = () => {
            validation(['required'], ward, 'Số nhà');
        }
    }
}

function handleClickSubmit() {
    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

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
            discount_code: discountCode.dataset.id,
        }
        callApiOrder(dataOrder);
    }
}

export { handleClickSubmit, handleBlur }
