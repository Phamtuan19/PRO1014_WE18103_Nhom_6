

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

const password = document.querySelector(".password");
const password_comfirm = document.querySelector(".password_comfirm");

password.onblur = () => {
    validation(['required', 'min|6'], password, 'Mật khẩu mới')
}

password_comfirm.onblur = () => {
    validation(['required', 'min|6', 'passwordConfirm'], password, 'Mật khẩu nhập lại', password_comfirm)
}

document.querySelector(".button").onclick = () => {
    const vali_password = validation(['required', 'min|6'], password, 'Mật khẩu')
    const vali_password_comfirm = validation(['required', 'min|6', 'passwordConfirm'], password, 'Mật khẩu nhập lại', password_comfirm)

    if (vali_password && vali_password_comfirm) {

        const token = ((window.location.pathname).split('/'))[2];

        const dataPassword = {
            token: token,
            password: password.value,
        }

        callAPILoading();

        setTimeout(() => {
            serviceApi.patchComfirmPassword(dataPassword)
                .then(function (response) {
                    clearApiLoading();
                    if (response.status !== 200) {
                        showErrorToast("Cập nhật thất bại!");
                    }
                    return response.json();
                })
                .then(function (data) {
                    if (data) {
                        showSuccessToast("Đổi mật khẩu thành công!");
                        setTimeout(() => {
                            window.location.href = enpointUrl.login;
                        }, 2000);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
        }, 2000)

    }
}

