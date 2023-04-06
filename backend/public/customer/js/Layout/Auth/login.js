
import { validation } from '../../method/index.js';
import { serviceApi, enpointUrl } from '../../service/index.js';
import { showErrorToast, showSuccessToast } from '../../message/index.js';

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

        serviceApi.postLogin(data)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {

                const authUser = {
                    user: data.user,
                    token: data.token,
                }
                console.log(authUser);
                localStorage.setItem('authUser', JSON.stringify(authUser))
                console.log(enpointUrl.home);
                setTimeout(function () {

                    window.location.href = enpointUrl.home
                }, 1000)

            })

    }
}
