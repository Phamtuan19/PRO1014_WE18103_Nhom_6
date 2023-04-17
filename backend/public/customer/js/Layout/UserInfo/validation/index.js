import { validation } from "../../../method/index.js";
import { serviceApi } from '../../../service/index.js';
import { handleAddressLocal } from '../../../method/index.js';
import { callAPILoading, clearApiLoading, showErrorToast, showSuccessToast } from '../../../message/index.js';

const input_name = document.querySelector(".user_name");
const input_phone = document.querySelector(".user_phone");
const input_email = document.querySelector(".user_email");
const input_province = document.querySelector("#province");
const input_district = document.querySelector("#district");
const input_ward = document.querySelector("#ward");
const input_password = document.querySelector('.user_password__authentication');
const user_auth_password = document.querySelector('.user_password__authentication');
const btn_check_password = document.querySelector(".btn__check__password");

const btn_saver = document.querySelector(".btn-save");

function validationUserInfo(authUser) {
    input_name.onblur = () => {
        if (validation(['required', 'min|6'], input_name, "Tên người dùng")) {
            if (input_name.value !== authUser.user.name) {
                btn_saver.removeAttribute('disabled');
            } else {
                btn_saver.setAttribute('disabled', 'true')
            }
        }
    }
    input_phone.onblur = () => {
        if (validation(['required', 'phone'], input_phone, 'Số điện thoại')) {
            if (input_phone.value !== authUser.user.phone) {
                btn_saver.removeAttribute('disabled');
            } else {
                btn_saver.setAttribute('disabled', 'true')
            }
        }
    }
    input_email.onblur = () => {
        if (validation(['required', 'email'], input_email, "Địa chỉ Email")) {
            if (input_email.value !== authUser.user.email) {
                btn_saver.removeAttribute('disabled');
            } else {
                btn_saver.setAttribute('disabled', 'true')
            }
        }
    }
    input_province.onblur = () => {
        if (validation(['required'], input_province, 'Tỉnh / Thành Phố')) {
            if (input_province.value !== authUser.user.province) {
                btn_saver.removeAttribute('disabled');
            } else {
                btn_saver.setAttribute('disabled', 'true')
            }
        }
    }
    input_district.onblur = () => {
        if (validation(['required'], input_district, 'Quận / Huyện')) {
            if (input_district.value !== authUser.user.district) {
                btn_saver.removeAttribute('disabled');
            } else {
                btn_saver.setAttribute('disabled', 'true')
            }
        }
    }
    input_ward.onblur = () => {
        if (validation(['required'], input_ward, 'Xã Phường')) {
            if (input_ward.value !== authUser.user.ward) {
                btn_saver.removeAttribute('disabled');
            } else {
                btn_saver.setAttribute('disabled', 'true')
            }
        }
    }
    input_password.onblur = () => {
        if (validation(['required', 'min|6'], input_password, 'Mật khẩu')) {
            btn_check_password.onclick = () => {
                const id = authUser.user.id;
                const token = authUser.token;
                console.log(`${input_province.value} - ${input_district.value} - ${input_ward.value}`);
                const data = {
                    name: input_name.value,
                    email: input_email.value,
                    phone: input_phone.value,
                    address: `${input_province.value} - ${input_district.value} - ${input_ward.value}`,
                    password: user_auth_password.value,
                }
                console.log(data);

                callAPILoading()

                setTimeout(() => {
                    serviceApi.patchUpdateUser(id, token, data)
                        .then(function (response) {
                            clearApiLoading();
                            if (response.status !== 200) {
                                showErrorToast("Cập Nhật Thông tin thất bại");
                            }
                            return response.json();
                        })
                        .then(function (data) {
                            if (data) {
                                handleAddressLocal(data, authUser);
                                showSuccessToast("Cập nhật thành công!");
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            } else {
                                input_password.nextElementSibling.innerText = "Mật khẩu không chính xác"
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                }, 2000);
            }
        }
    }
}


export default validationUserInfo;
