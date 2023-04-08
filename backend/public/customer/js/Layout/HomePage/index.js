
import { serviceApi } from '../../service/index.js';
import { productItem, renderTotalCard } from '../../render/index.js';

renderTotalCard()

const filterControls = document.querySelectorAll('.home__title__text')
const filter = "bestseller";
CallApiProductSale(filter)
const item_body = document.querySelector('.product-sale__test')
// Call APi render Product sale
function CallApiProductSale(filter) {
    serviceApi.getHomeProductSale(filter)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            productItem(data, item_body, 3)
            filterControls.forEach((e) => {
                e.onclick = () => {
                    filterControls.forEach((filterItem) => {
                        filterItem.classList.remove('active')
                    })
                    e.classList.add('active')

                    CallApiProductSale(e.dataset.filter)
                }
            })



        })
        .catch(function (error) {
            console.log(error);
        })
}

// Call APi render Product list
serviceApi.getHomeProductList()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        const location = document.querySelector('.product-list__test')
        productItem(data, location, 3)
    })
    .catch(function (error) {
        console.log(error);
    })
