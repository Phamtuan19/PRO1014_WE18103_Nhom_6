
/*
*
*   Render User Info
*
*/

import { apiProvinces } from '../../render/index.js';
import renderInfo from './render-info/index.js';
import validationUserInfo from './validation/index.js';
import middlewareAuth from '../../Middleware/index.js';
import handleEditPassword from './edit-password/index.js';

middlewareAuth()

const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : null;

if (authUser !== null) {

    renderInfo(authUser.user);
    apiProvinces();
    validationUserInfo(authUser);

    const user__action__profile = document.querySelector(".user__action__profile");
    const user__action__password = document.querySelector(".user__action__password");
    const user__action__order = document.querySelector(".user__action__order");

    const editProfile = document.querySelector(".edit-profile");
    const editPassword = document.querySelector(".edit-password");
    const editOrder = document.querySelector(".edit-order");

    user__action__profile.addEventListener("click", () => {
        editProfile.classList.remove('d-none');
        editPassword.classList.add('d-none');
        editOrder.classList.add('d-none');
        user__action__profile.classList.add("active");
        user__action__password.classList.remove('active');
        user__action__order.classList.remove("active");

        renderInfo(authUser.user);
        apiProvinces();
        validationUserInfo(authUser);
    })

    user__action__password.addEventListener("click", () => {
        editProfile.classList.add('d-none');
        editPassword.classList.remove('d-none');
        editOrder.classList.add('d-none');
        user__action__password.classList.add('active');
        user__action__profile.classList.remove("active");
        user__action__order.classList.remove("active");

        handleEditPassword(authUser);
    })

    user__action__order.addEventListener("click", () => {
        editProfile.classList.add('d-none');
        editPassword.classList.add('d-none');
        editOrder.classList.remove('d-none');
        user__action__order.classList.add('active');
        user__action__profile.classList.remove("active");
        user__action__password.classList.remove("active");

        handleEditPassword(authUser);
    })
}



