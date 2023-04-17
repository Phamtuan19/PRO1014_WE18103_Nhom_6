
/*
*
*   Call api Page Order
*
*/


import { serviceApi, enpointUrl } from '../../../service/index.js';
import { showErrorToast, showSuccessToast, callAPILoading, clearApiLoading } from '../../../message/index.js';

function callApiOrder(dataOrder) {

    callAPILoading();
    console.log(dataOrder);
    setTimeout(() => {
        serviceApi.postOrder(dataOrder)
            .then(function (response) {
                clearApiLoading();
                if (response.status !== 200 && response.status !== 205) {
                    showErrorToast("Đã có lỗi xảy ra. Vui lòng kiểm tra lại");
                }else if (response.status === 205) {
                    showErrorToast("Sản phẩm trong không đủ đáp ứng đơn hàng của bạn!");
                } else {
                    return response.json();
                }
            })
            .then(function (data) {
                console.log(data);
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
