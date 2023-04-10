
/*
*
*   Render User Info
*
*/
import { enpointUrl, serviceApi } from '../../service/index.js';
import { apiProvinces } from '../../render/index.js';
import { validation } from "../../method/index.js";
import renderInfo from './render-info/index.js';
import validationUserInfo from './validation/index.js';
import middlewareAuth from '../../Middleware/index.js';

middlewareAuth()

const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : null;

if (authUser !== null) {
    renderInfo(authUser.user);
    apiProvinces();
    validationUserInfo(authUser)
}



