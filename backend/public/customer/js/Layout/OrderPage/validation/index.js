
import { validation } from "../../../method/index.js";

const name = document.querySelector(".order_name")
const email = document.querySelector(".order_email")
const phone = document.querySelector(".order_phone")
const province = document.querySelector(".province")
const district = document.querySelector(".district")
const ward = document.querySelector(".ward")
const house_number = document.querySelector(".house_number")
const order_note = document.querySelector(".order_note")

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
    order_note.onblur = () => {
        validation(['required'], order_note, 'ghi chú');
    }
}

function handleClickSubmit() {

    let isValidOrder = false;

    const delivery_form = document.querySelectorAll(".delivery_form");
    let isValid = {
        is: false,
        value: ''
    };
    for (let i = 0; i < delivery_form.length; i++) {
        if (validation(['required'], delivery_form[i], 'Hình thức thanh toán')) {
            isValid.is = true;
            isValid.value = delivery_form[i].dataset.value;
            break;
        }
    }

    if (!isValid.is) {
        console.log('không được để trống!!!');
    } else {
        console.log(isValid.value);
    }

    if (validation(['required', 'min|6'], name, 'Tên khách hàng') ||
        validation(['required', 'email'], email, 'email') ||
        validation(['required', 'phone'], phone, 'Số điện thoại') ||
        validation(['required'], province, 'TỈnh') ||
        validation(['required'], district, 'Huyện') ||
        validation(['required'], house_number, 'Xã') ||
        validation(['required'], ward, 'Số nhà') ||
        validation(['required'], order_note, 'ghi chú')) {
        isValidOrder = true
    }

    if (isValid.is && isValidOrder) {
        console.log(true);
    } else {
        console.log(false);
    }
}

export { handleClickSubmit, handleBlur }
