

/*
*
*   Auth list order
*
*/

import { serviceApi, enpointUrl, baseUrl } from '../../service/index.js';
import { showSuccessToast, showErrorToast, callAPILoading, clearApiLoading } from "../../message/index.js";
import { formatCurrency } from '../../method/index.js';
import middlewareAuth from '../../Middleware/index.js';

middlewareAuth()

const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : null;

if (authUser) {
    serviceApi.getAuthListOrder(authUser.token)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            console.log(data);
            renderListOrder(data);
        })
        .catch(function (error) {
            console.log(error);
        })
}


function renderListOrder(data) {
    const html = data.map((e, index) => {
        return `
            <tr>
                <td>${index + 1}</td>
                <td>${e.code_order}</td>
                <td>
                    <p> ${e.quantity} sản phẩm</p>
                </td>
                <td id="fontbold">${formatCurrency(e.total_price)}</td>
                <td>
                    <p class="order_status badge btn-order__status" data-id="${e.order_status_id}">${e.order_status_name}</p>
                </td>
                <td>${e.updated_at}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-show__order" data-id="${e.id}">Chi tiết đơn hàng</button>
                </td>
            </tr>
        `
    })
    document.querySelector(".table_lis_order").innerHTML = html
    handleClickBtn()
    renderOrderStatusColor()
}

function renderOrderStatusColor() {
    const order_status = document.querySelectorAll(".order_status");

    order_status.forEach(e => {
        if (Number(e.dataset.id) === 1) {
            e.classList.add('btn-gradient-secondary')
        } else if (Number(e.dataset.id) === 2) {
            e.classList.add('btn-gradient-info')
        } else if (Number(e.dataset.id) === 3) {
            e.classList.add('btn-gradient-primary')
        } else if (Number(e.dataset.id) === 4) {
            e.classList.add('btn-gradient-success')
        } else {
            e.classList.add('btn-gradient-danger')
        }
    })
}

function handleClickBtn() {
    const btn = document.querySelectorAll(".btn-show__order");

    btn.forEach(e => {
        e.onclick = () => {
            callAPILoading()
            setTimeout(() => {
                document.querySelector('.modal').classList.remove('d-none');
                fetch('http://127.0.0.1:8000/api/list-order-detail/' + e.dataset.id, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${authUser.token}`
                    },
                })
                    .then(function (response) {
                        clearApiLoading();
                        return response.json();
                    })
                    .then(function (data) {
                        console.log(data);
                        renderModal(data)
                    })
            }, 2000);
        }
    })

    document.querySelector(".btn-close").onclick = () => {
        document.querySelector('.modal').classList.add('d-none');
    }
}

function renderModal(data) {
    document.querySelector(".order__code").innerText = data[0].code_order
    document.querySelector(".detail__order").innerHTML = `
                <div class="col-4 box__detail__order">
                    <p class="title__order__detail">Người nhận: </p>
                    <p class="content__order_detail">${data[0].user_name}</p>
                </div>
                <div class="col-8 box__detail__order">
                    <p class="title__order__detail">Ngày đặt hàng: </p>
                    <p class="content__order_detail">${data[0].created_at}</p>
                </div>
                <div class="col-4 box__detail__order">
                    <p class="title__order__detail">Email: </p>
                    <p class="content__order_detail">${data[0].user_email}</p>
                </div>
                <div class="col-8 box__detail__order">
                    <p class="title__order__detail">Địa chỉ nhận hàng: </p>
                    <p class="content__order_detail">${data[0].user_province_city} - ${data[0].user_county_district} - ${data[0].user_house_number_street_name}</p>
                </div>
                <div class="col-4 box__detail__order">
                    <p class="title__order__detail">Số điện thoại: </p>
                    <p class="content__order_detail">${data[0].user_phone}</p>
                </div>
                <div class="col-8 box__detail__order">
                    <p class="title__order__detail">Trạng thái: </p>
                    <p class="content__order_detail">
                        ${data[0].order_status_name}
                        <span> - </span>
                        <span>${data[0].updated_at}</span>
                    </p>
                </div>
                <div class="col-4 box__detail__order">
                    <p class="title__order__detail">Tổng tiền: </p>
                    <p class="content__order_detail">
                        ${formatCurrency(data[0].total_price)}
                    </p>
                </div>
            `
    const html = (data.detail).map((item, index) => {
        // console.log(item);
        return `
            <tr>
                <td>${index + 1}</td>
                <td style="text-align: center;">
                    <img class="image__products"
                        src="${item.image_url}"
                        alt="">
                </td>
                <td> ${item.product_name} </td>
                <td> ${formatCurrency(item.price)} </td>
                <td> ${formatCurrency(item.price_sale)} </td>
                <td> ${item.quantity} </td>
                <td> ${formatCurrency(item.price * item.quantity)} </td>
            </tr>
        `
    })

    document.querySelector(".content__table__order").innerHTML = html.join('')
    console.log(data[0].order_status_id);
    if (data[0].order_status_id < 3) {
        document.querySelector('.modal-footer').innerHTML = `<button type="button" data-id="${data[0].id}" class="btn btn-danger btn__cancellation">Hủy đơn</button>`
        handleOrderCancellation()
    }else {
        document.querySelector('.modal-footer').innerHTML = '';
    }
}


function handleOrderCancellation() {
    const btn = document.querySelector('.btn__cancellation');
    if (btn) {
        btn.onclick = () => {
            console.log(btn);

            callAPILoading()
            setTimeout(() => {
                fetch('http://127.0.0.1:8000/api/order-cancellation/' + btn.dataset.id, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${authUser.token}`
                    },
                })
                    .then(function (response) {
                        clearApiLoading();
                        if (response.status === 200) {
                            showSuccessToast('Cập nhật thành công!');
                            return response.json();
                        } else {
                            showErrorToast('Cập nhật thất bại!');
                            return response.json();
                        }
                    })
                    .then(function (data) {
                        location.reload()
                        console.log(data);
                    })
            }, 2000);
        }
    }
}
