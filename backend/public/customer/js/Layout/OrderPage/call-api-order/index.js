
/*
*
*   Call api Page Order
*
*/


import { serviceApi, enpointUrl } from '../../../service/index.js';
import { showErrorToast, showSuccessToast, callAPILoading, clearApiLoading } from '../../../message/index.js';

function callApiOrder() {

    const data = dataOrder();

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

function dataOrder() {
    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

    if (localCart.length > 0) {
        const name = document.querySelector('.order_name').value;
        const phone = document.querySelector('.order_phone').value;
        const email = document.querySelector('.order_email').value;
        const province = document.querySelector('#province').getAttribute("data-province");
        const district = document.querySelector('#district').getAttribute("data-district");
        const house_number = document.querySelector('#house_number').getAttribute("data-houseNumber");
        const ward = document.querySelector('#ward').getAttribute("data-ward");
        const orderNote = document.querySelector('#order_note').value;
        const delivery_form = document.querySelector('input[name="delivery_form"]:checked').dataset.value;

        let dataOrder = {
            user_id: $('.order_name').data('userid'),
            name: name,
            email: email,
            phone: phone,
            province_city: province,
            county_district: district,
            ward: ward,
            house_number_street_name: house_number,
            content_note: orderNote,
            products: localCart,
            total_product_quantity: localCart.length,
            payment_form: delivery_form,
            discount_code_id: null,
        }

        return dataOrder;
    } else {
        console.log("không có sản phẩm");
    }
}

export default callApiOrder;
