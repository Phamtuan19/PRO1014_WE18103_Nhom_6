
import { validation, handleAddressLocal } from '../../method/index.js';
import { serviceApi, enpointUrl } from '../../service/index.js';
import { showErrorToast, showSuccessToast, callAPILoading, clearApiLoading } from '../../message/index.js';
import middlewareAuth from '../../Middleware/index.js';
import { windowLoading } from '../../message/index.js';


windowLoading()
// middlewareAuth();

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

        const data = {
            email: email.value.trim(),
            password: password.value.trim()
        }

        callAPILoading();

        setTimeout(() => {
            serviceApi.postLogin(data)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    let address = (data.user.address).split(' - ')
                    const authUser = {
                        token: data.token,
                        user: {
                            id: data.user.id,
                            name: data.user.name,
                            phone: data.user.phone,
                            email: data.user.email,
                            image: data.user.image_url,
                            province: address[0],
                            district: address[1],
                            ward: address[2],
                        }
                    }
                    localStorage.setItem('authUser', JSON.stringify(authUser))
                    setTimeout(function () {
                        window.location.href = enpointUrl.home
                    }, 1000)

                })
        }, 2000);
    }
}

