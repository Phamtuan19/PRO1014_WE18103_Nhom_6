

/*
*
*   Auth list order
*
*/

import { serviceApi, enpointUrl, baseUrl } from '../../service/index.js';
import { showSuccessToast, showErrorToast } from "../../message/index.js";
import { formatCurrency } from '../../method/index.js';


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
    const html = data.map((e) => {
        return `
            <tr>
                <td>2</td>
                <td>${e.code_order}</td>
                <td>
                    <p> ${e.quantity} sản phẩm</p>
                </td>
                <td id="fontbold">${formatCurrency(e.total_price)}</td>
                <td>
                    <p>${e.order_status_name}</p>
                </td>
                <td>${e.updated_at}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal">Chi tiết đơn hàng</button>

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped">
                                           Chi tiết đơn hàng ${e.code_order}
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </td>
            </tr>
        `
    })
    console.log(document.querySelector(".table_lis_order"));
    document.querySelector(".table_lis_order").innerHTML = html
}
