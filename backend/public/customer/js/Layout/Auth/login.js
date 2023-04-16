

/*
*
* Trang đăng ký
*
*/

import { validation, handleAddressLocal } from '../../method/index.js';
import { serviceApi, enpointUrl } from '../../service/index.js';
import { showErrorToast, showSuccessToast, callAPILoading, clearApiLoading } from '../../message/index.js';
import middlewareAuth from '../../Middleware/index.js';
import { windowLoading } from '../../message/index.js';


windowLoading()
middlewareAuth();

const email = document.querySelector(".email");
const password = document.querySelector(".password");

email.onblur = () => {
    validation(['required', 'email'], email, 'Email')
}

password.onblur = () => {
    validation(['required', 'min|6'], password, 'Mật khẩu')
}

document.querySelector(".button").onclick = () => {
    const validEmail = validation(['required', 'email'], email, 'Email')
    const validPassword = validation(['required', 'min|6'], password, 'Mật khẩu')

    if (validEmail && validPassword) {

        const dataLogin = {
            email: email.value.trim(),
            password: password.value.trim()
        }

        callAPILoading();

        setTimeout(() => {
            serviceApi.postLogin(dataLogin)
                .then(function (response) {
                    clearApiLoading();
                    if (response.status !== 200) {
                        showErrorToast("Tài khoản hoặc mật khẩu không chính xác!");
                        // return response.json();
                    }
                    return response.json();
                })
                .then(function (data) {
                    if (data.token) {
                        showSuccessToast('Đăng nhập thành công!');
                        let address = data.user.address === null ? null : (data.user.address).split(' - ') ;
                        const authUser = {
                            token: data.token,
                            user: {
                                id: data.user.id,
                                name: data.user.name,
                                phone: data.user.phone,
                                email: data.user.email,
                                image: data.user.image_url,
                                province: data.user.address !== null ? address[0] : null,
                                district: data.user.address !== null ? address[1] : null,
                                ward: data.user.address !== null ? address[2] : null,
                            }
                        }
                        localStorage.setItem('authUser', JSON.stringify(authUser))
                        setTimeout(function () {
                            window.location.href = enpointUrl.home
                        }, 1000)
                    }
                })
                .catch(function (error) {
                    console.log(error);
                })
        }, 2000);
    }
}

