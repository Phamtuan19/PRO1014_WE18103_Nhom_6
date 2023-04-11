
/*
*
*   Api Dashdoard page admin
*
*/


import { renderTurnover, renderTotalOrder, renderTotalOrderSuccess } from '../render/index.js';

const serviceApi = 'http://127.0.0.1:8000/api' + window.location.pathname + window.location.search;

function callApiDashboard() {
    fetch(serviceApi)
        .then(function (response) {
            return response.json('');
        })
        .then(function (data) {
            renderTurnover(data);
            renderTotalOrder(data);
            renderTotalOrderSuccess(data);
        })
}


export default callApiDashboard;
