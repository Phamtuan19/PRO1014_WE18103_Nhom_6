

/*
*
* Trang đăng nhập
*
*/

import { handleAddressLocal } from '../../../method/index.js';
import { serviceApi, enpointUrl } from '../../../service/index.js';
import { showErrorToast, showSuccessToast, callAPILoading, clearApiLoading } from '../../..//message/index.js';
import middlewareAuth from '../../../Middleware/index.js';
import { windowLoading } from '../../../message/index.js';
import { validationRegister, handleCLickSubmit } from './validation/index.js';

windowLoading()
middlewareAuth();

const name = document.querySelector(".name");
const email = document.querySelector(".email");
const phone = document.querySelector(".phone");
const password = document.querySelector(".password");

validationRegister();

const button = document.querySelector(".button");
button.onclick = () => {
    handleCLickSubmit();
}
