
/*
*
*   Call api Page Order
*
*/


import { serviceApi, enpointUrl } from '../../../service/index.js';
import { showErrorToast, showSuccessToast, callAPILoading, clearApiLoading } from '../../../message/index.js';

function callApiOrder(data) {

    callAPILoading();

    setTimeout(() => {
        serviceApi.postOrder(data)
            .then(function (response) {
                clearApiLoading();
                if (response.status !== 200) {
                    showErrorToast("Đã có lỗi xảy ra. Vui lòng kiểm tra lại");
                } else {
                    return response.json();
                }
            })
            .then(function (data) {
                if (data) {
                    showSuccessToast("Đặt hàng thành công!");
                    localStorage.removeItem("local-cart");
                    setTimeout(() => {
                        window.location.href = enpointUrl.home;
                    })
                }
            })
            .catch(function (error) {
                console.log(error);
            })
    }, 2000)
}

export default callApiOrder;
