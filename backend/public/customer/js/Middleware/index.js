import { enpointUrl } from '../service/index.js';

function middlewareAuth() {
    const authUser = localStorage.getItem("authUser") ? JSON.stringify(localStorage.getItem("authUser")) : null;

    const getUrl = window.location.href;

    if (authUser !== null) {
        if (getUrl === enpointUrl.login || getUrl === enpointUrl.register || getUrl === enpointUrl.resetPassword) {
            window.location.href = enpointUrl.home
        }
    }else {
        if(getUrl === enpointUrl.userInfo){
            window.location.href = enpointUrl.home
        }
    }
}

export default middlewareAuth;
