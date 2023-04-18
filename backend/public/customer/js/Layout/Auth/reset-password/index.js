

/*
*
* Trang đăng ký
*
*/

import { validation, handleAddressLocal } from '../../../method/index.js';
import { serviceApi, enpointUrl } from '../../../service/index.js';
import { showErrorToast, showSuccessToast, callAPILoading, clearApiLoading } from '../../../message/index.js';
import middlewareAuth from '../../../Middleware/index.js';
import { windowLoading } from '../../../message/index.js';


windowLoading()
middlewareAuth();

const email = document.querySelector(".email");

email.onblur = () => {
    validation(['required', 'email'], email, 'Email')
}

document.querySelector(".button").onclick = () => {
    const validEmail = validation(['required', 'email'], email, 'Email')

    if (validEmail) {

        const dataReset = {
            email: email.value.trim()
        }

        callAPILoading();

        setTimeout(() => {
            serviceApi.patchResetPassword(dataReset)
                .then(function (response) {
                    clearApiLoading();
                    if (response.status !== 200) {
                        showErrorToast('Email không tồn tại!');
                        document.querySelector('.email').nextElementSibling.innerText = "Email không tồn tại!";
                    } else {
                        return response.json();
                    }
                })
                .then(function (data) {
                    if (data.status === 200) {
                        showSuccessToast("Vui lòng kiểm tra email để thay đổi mật khẩu!");
                        console.log(data);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
        }, 2000);
    }
}

