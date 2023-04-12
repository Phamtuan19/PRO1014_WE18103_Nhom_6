
/*
*
*   Api Dashdoard page admin
*
*/


import { renderTurnover, renderTotalOrder, renderTotalOrderSuccess, renderTopProduct } from '../render/index.js';

const serviceApi = 'http://127.0.0.1:8000/api' + window.location.pathname + window.location.search;

function callApiDashboard() {
    fetch(serviceApi)
        .then(function (response) {
            return response.json('');
        })
        .then(function (data) {
            console.log(data);
            renderTurnover(data.statistic);
            renderTotalOrder(data.statistic);
            renderTotalOrderSuccess(data.statistic);
            renderTopProduct(data.topProducts)
        })
}


export default callApiDashboard;
