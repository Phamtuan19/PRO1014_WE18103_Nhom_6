
/*
*
* validation trang đăng nhập
*
*/

import { validation } from '../../../../method/index.js';
import { serviceApi, enpointUrl } from '../../../../service/index.js';
import { showErrorToast, showSuccessToast, callAPILoading, clearApiLoading } from '../../../../message/index.js';

const name = document.querySelector(".name");
const email = document.querySelector(".email");
const phone = document.querySelector(".phone");
const password = document.querySelector(".password");

function validationRegister() {
    name.onblur = () => {
        validation(['required', 'min|6'], name, 'Tên tài khoản')
    }

    email.onblur = () => {
        validation(['required', 'email'], email, 'Email')
    }

    phone.onblur = () => {
        validation(['required', 'phone'], phone, 'Số điện thoại')
    }

    password.onblur = () => {
        validation(['required', 'min|6'], password, 'Mật khẩu')
    }
}

function handleCLickSubmit() {
    if (validation(['required', 'min|6'], name, 'Tên tài khoản') &&
        validation(['required', 'email'], email, 'Email') &&
        validation(['required', 'phone'], phone, 'Số điện thoại') &&
        validation(['required', 'min|6'], password, 'Mật khẩu')) {
        console.log('object');
        const dataRegiter = {
            name: name.value,
            email: email.value,
            phone: phone.value,
            password: password.value
        }

        console.log(dataRegiter);

        callAPILoading();
        setTimeout(() => {
            callApiRegiter(dataRegiter);
        })
    }
}

function callApiRegiter(dataRegiter) {
    serviceApi.postRegister(dataRegiter)
        .then(function (response) {
            clearApiLoading();
            if (response.status === 409 || response.status === 402) {
                showErrorToast('Đăng ký thất bại');
                return response.json();
            }
            return response.json();
        })
        .then(function (data) {
            if (data.status) {
                if (data.status === 409) {
                    document.querySelector(".errorEmail").innerText = data.msg
                }
                if (data.status === 410) {
                    document.querySelector(".errorPhone").innerText = data.msg
                }
                if (data.status === 200) {
                    showSuccessToast('Đăng ký thành công!')
                    setTimeout(() => {
                        window.location.href = enpointUrl.login;
                    }, 2000)
                }
            }
        })
        .catch(function (error) {
            console.log(error);
        })
}

export { validationRegister, handleCLickSubmit };

