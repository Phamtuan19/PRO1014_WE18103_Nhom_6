import { enpointUrl } from '../service/index.js';

function middlewareAuth() {
    const authUser = localStorage.getItem("authUser") ? JSON.stringify(localStorage.getItem("authUser")) : [];

    const getUrl = window.location.href;
    console.log(authUser !== 'null');
    if (authUser.length > 0) {
        if (getUrl === enpointUrl.login
            || getUrl === enpointUrl.register
            || getUrl === enpointUrl.resetPassword) {
            window.location.href = enpointUrl.home
        }
    }else {
        if(getUrl === enpointUrl.userInfo || getUrl === enpointUrl.userOrderPage){
            window.location.href = enpointUrl.home
        }
    }
}

export default middlewareAuth;
