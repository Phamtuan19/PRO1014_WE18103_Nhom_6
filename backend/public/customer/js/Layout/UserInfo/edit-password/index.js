import { validation } from "../../../method/index.js";
import { serviceApi } from "../../../service/index.js";
import { callAPILoading, clearApiLoading, showErrorToast, showSuccessToast } from '../../../message/index.js';

function handleEditPassword(authUser) {
    const current_password = document.querySelector(".current_password");
    const new_password = document.querySelector(".new_password");
    const new_password__confirm = document.querySelector(".new_password__confirm");
    const btn_save_passworl = document.querySelector("#btn_save_password");

    current_password.onblur = () => {
        validation(['required', 'min|6'], current_password, "Mật khẩu hiện tại");
    }
    new_password.onblur = () => {
        validation(['required', 'min|6'], new_password, "Mật khẩu mới");
    }
    new_password__confirm.onblur = () => {
        validation(['required', 'min|6', 'passwordConfirm'], new_password, "Mật khẩu nhập lại", new_password__confirm);
    }

    console.log('edit password');

    btn_save_passworl.onclick = () => {
        if (validation(['required', 'min|6'], current_password, "Mật khẩu hiện tại") &&
            validation(['required', 'min|6'], new_password, "Mật khẩu mới") &&
            validation(['required', 'min|6', 'passwordConfirm'], new_password, "Mật khẩu nhập lại", new_password__confirm)) {

            const id = authUser.user.id;
            const token = authUser.token;
            const data = {
                currentPassword: current_password.value,
                newPassword: new_password.value,
            }

            let logStatusCode;

            callAPILoading()

            setTimeout(() => {
                serviceApi.patchUpdatePassword(id, token, data)
                    .then(function (response) {
                        clearApiLoading();
                        if (response.status !== 200) {
                            showErrorToast("Cập nhật thất bại!");
                        } else {
                            return response.json()
                        }
                    })
                    .then(function (data) {
                        if (data) {
                            showSuccessToast(data.msg)
                            current_password.value = ''
                            new_password.value = ''
                            new_password__confirm.value = ''
                        } else {
                            current_password.nextElementSibling.innerText = "Mật khẩu không đúng.";
                        }
                    })
            }, 2000);
        }
    }
}

export default handleEditPassword;

