


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
                // console.log(authUser);
                console.log(inputCode.value);
                if (authUser.token) {
                    cartTotalsMoney();
                    callApiDiscountCode(inputCode.value)
                } else {
                    showErrorToast('Bạn phải đăng nhập mới sử dụng được mã giảm giá')
                }

            } else {
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
            return response.json();
        })
        .then(function (data) {
            if (data.msg === 'success') {
                showSuccessToast("Áp dụng mã giảm giá thành công!");
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


fetch('http://127.0.0.1:8000/api/discount/code')
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        if (data) {
            if (data.length > 0) {
                
                if (authUser) {
                    document.querySelector('.discount__list__item').innerHTML = data.map(e => {
                        return `
                    <div class="evt_cart_2_sli_ite_content">
                        <div class="evt_cart_2_sli_ite_left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="104.554" height="125.395"
                                viewBox="0 0 104.554 125.395" class="cart2-svg-icon">
                                <path id="Frame_icon_web"
                                    d="M95.424,124.4H47.593l-33.592,0a12,12,0,0,1-12-12V12A12,12,0,0,1,14,0H80.785l.255,0H95.424a10.364,10.364,0,0,0,10.129,10.165l-.005,4.374a2.907,2.907,0,1,0,0,5.813v2.324a2.907,2.907,0,1,0,0,5.814v2.324a2.907,2.907,0,0,0-2.06.852,2.874,2.874,0,0,0-.855,2.05,2.917,2.917,0,0,0,2.915,2.912v2.324a2.907,2.907,0,0,0-2.06.852,2.874,2.874,0,0,0-.855,2.05,2.917,2.917,0,0,0,2.915,2.911v2.324a2.906,2.906,0,0,0-2.06.852,2.876,2.876,0,0,0-.855,2.051,2.912,2.912,0,0,0,2.915,2.9V55.22a2.907,2.907,0,1,0,0,5.813v2.324a2.907,2.907,0,1,0,0,5.813V71.5a2.907,2.907,0,0,0-2.06.852,2.874,2.874,0,0,0-.855,2.05,2.917,2.917,0,0,0,2.915,2.912v2.324a2.906,2.906,0,0,0-2.06.852,2.876,2.876,0,0,0-.855,2.051,2.912,2.912,0,0,0,2.915,2.9v2.324a2.907,2.907,0,1,0,0,5.814V95.9a2.907,2.907,0,1,0,0,5.814v2.324a2.906,2.906,0,0,0-2.06.852,2.876,2.876,0,0,0-.855,2.051,2.916,2.916,0,0,0,2.915,2.911l0,3.987A10.328,10.328,0,0,0,95.423,124.2c0,.065,0,.131,0,.2h0Z"
                                    transform="translate(-1.501 0.499)" fill="#FFB323" stroke="rgba(0,0,0,0)"
                                    stroke-miterlimit="10" stroke-width="1"></path>
                            </svg>
                            <img class="evt_cart_2_icon_type"
                                src="https://cdn0.fahasa.com/skin/frontend/ma_vanese/fahasa/images/event_cart_2/ico_promotion.svg?q=102131">
                        </div>
                        <div class="evt_cart_2_sli_ite_right">
                            <div class="sli_ite_right_header">
                                <div class="ite_txt_right">MÃ GIẢM 30K - ĐƠN HÀNG TỪ 270K</div>
                                <div class="ite_more_right btn-discount" data-code="${e.discount_code}">Áp dụng</div>
                            </div>
                            <div class="sli_ite_right_content d-flex flex-column">
                                <span>Áp dụng tư: ${e.time_application}</span>
                                <span>đến ${e.expired}</span>
                            </div>
                        </div>
                    </div>
                `
                    }).join('')

                    handleClikcDiscountCode()
                } else {
                    console.log('discount__list');
                    document.querySelector('.discount__list').classList.add('d-none');
                }
            }
        }
    })
    .catch(function (error) {
        console.log(error);
    })

function handleClikcDiscountCode() {
    const btn_discount = document.querySelectorAll('.btn-discount');
    const input_discountCode = document.querySelector('.discount-code_input');

    btn_discount.forEach(e => {
        e.onclick = () => {
            input_discountCode.value = e.dataset.code
            callApiDiscountCode(e.dataset.code)
        }
    })
}

export default valiBtnDiscountCode;
