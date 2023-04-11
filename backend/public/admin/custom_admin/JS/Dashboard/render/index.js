
/*
*
*   Render page Dashboard
*
*/

import { formatCurrency } from '../../../../../customer/js/method/index.js'

function renderTurnover(data) {
    const turnover = document.querySelector(".turnover");
    if (data.turnover) {
        turnover.innerHTML = `
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Doanh thu <i
                        class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5 total__money" data-money="${data.turnover.total}">${formatCurrency(data.turnover.total)}</h2>
                <div class="d-flex">
                    <h6 class="card-text rate" data-rate="${data.turnover.rate}"
                        data-detail="${data.turnover.detail}">

                    </h6>
                    <span style="font-size: 14px; font-weight: 600; margin-left: 8px"></span>
                </div>
            </div>
        `
    }

    rateMoney()
}

function renderTotalOrder(data) {
    const totalOrder = document.querySelector(".totalOrder");
    if (data.totalOrder) {
        totalOrder.innerHTML = `
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Đơn đặt hàng <i
                        class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">${formatCurrency(data.totalOrder.total)}</h2>
                <div class="d-flex">
                    <h6 class="card-text rate__order" data-rate="${data.totalOrder.rate}"
                        data-detail="${data.totalOrder.detail}">

                    </h6>
                    <span style="font-size: 14px; font-weight: 600; margin-left: 8px"></span>
                </div>
            </div>
        `
    }

    rate()
}

function renderTotalOrderSuccess(data) {
    const totalOrderSuccess = document.querySelector(".totalOrderSuccess");
    if (data.totalOrderSuccess) {
        totalOrderSuccess.innerHTML = `
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Đơn đặt hàng <i
                        class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">${formatCurrency(data.totalOrderSuccess.total)}</h2>
                <div class="d-flex">
                    <h6 class="card-text rate__order" data-rate="${data.totalOrderSuccess.rate}"
                        data-detail="${data.totalOrderSuccess.detail}">

                    </h6>
                    <span style="font-size: 14px; font-weight: 600; margin-left: 8px"></span>
                </div>
            </div>
        `
    }

    rate()
}

function rateMoney() {
    const rate = document.querySelectorAll(".rate")[0];

    if (rate.dataset.rate > 0) {
        rate.innerText = `Tăng ${Math.round(rate.dataset.rate)}%`;
    } else {
        rate.innerText = `Giảm ${Math.round(Math.abs(rate.dataset.rate))}%`;
    }

    if (Number(rate.dataset.detail) > 0) {
        rate.nextElementSibling.innerText = `( Tăng ${formatCurrency(Number(rate.dataset.detail))})`;
    } else {
        rate.nextElementSibling.innerText = `( Giảm ${formatCurrency(Math.abs(Number(rate.dataset.detail)))})`;
    }
}

function rate() {
    const rate = document.querySelectorAll(".rate__order");

    rate.forEach((e) => {
        if (e.dataset.rate > 0) {
            e.innerText = `Tăng ${Math.round(Number(e.dataset.rate))}%`;
        } else {
            e.innerText = `Giảm ${Math.round(Math.abs(Number((e.dataset.rate).trim())))}%`;
        }

        if (e.dataset.detail > 0) {
            e.nextElementSibling.innerText = `( Tăng ${(Number(e.dataset.detail))} đơn )`;
        } else {
            e.nextElementSibling.innerText = `( Giảm ${(Math.abs(Number(e.dataset.detail)))} đơn )`;
        }
    })
}

export { renderTurnover, renderTotalOrder, renderTotalOrderSuccess };
