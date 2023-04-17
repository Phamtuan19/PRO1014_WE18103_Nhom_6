import { enpointUrl } from '../service/index.js';

function middlewareAuth() {
    const authUser = JSON.stringify(localStorage.getItem("authUser"));

    const getUrl = window.location.href;
    console.log(authUser !== 'null');
    if (authUser === 'null') {
        if (getUrl === enpointUrl.userOrderPage || getUrl === enpointUrl.userInfo) {
            window.location.href = enpointUrl.home
        }
    }
    // else {
    //     if (getUrl === enpointUrl.userOrderPage) {
    //         window.location.href = enpointUrl.home
    //     }
    // }
}

export default middlewareAuth;
