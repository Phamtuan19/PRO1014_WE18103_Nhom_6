


import { validation } from "../../../method/index.js";
import { cartTotalsMoney } from "../../../render/index.js";
import { showErrorToast, showSuccessToast } from "../../../message/index.js";

const inputCode = document.querySelector('.discount-code_input');
const discount__btn = document.querySelector('.discount-code_btn');
const discountCode = document.querySelector(".discount-code_input");
const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : [];
function valiBtnDiscountCode() {
    if (discount__btn) {
        discount__btn.onclick = () => {
            if (validation(['required'], inputCode, 'Mã giảm giá')) {
                console.log(authUser);
                if (authUser.length > 0) {
                    cartTotalsMoney();
                    callApiDiscountCode(inputCode.value)
                } else {
                    showErrorToast('Bạn phải đăng nhập mới sử dụng được mã giảm giá')
                }

            } else {
                console.log(authUser);

                document.querySelector('.code').value = 0;
                document.querySelector('.code').dataset.value = 0;
                discountCode.dataset.id = ''
                cartTotalsMoney();
            }
        }
    }
}

function callApiDiscountCode(value) {
    console.log(value);
    fetch('http://127.0.0.1:8000/api/discount/code/' + value)
        .then(function (response) {
            // if (response.status !== 200) {

            //     return response.json();
            // }
            return response.json();
        })
        .then(function (data) {
            if (data.msg === 'success') {
                document.querySelector('.code').value = `- ${data.code.percentage_decrease}`;
                document.querySelector('.code').dataset.value = data.code.percentage_decrease;
                discountCode.dataset.id = data.code.id;
                cartTotalsMoney()
            } else if (data.msg === 'error') {
                showErrorToast("Mã giảm giá không khả dụng!");
                document.querySelector('.code').value = 0;
                document.querySelector('.code').dataset.value = 0;
                discountCode.dataset.id = ''
                cartTotalsMoney()
            }
        })
        .catch(function (error) {
            console.log(error);
        })
}

export default valiBtnDiscountCode;
