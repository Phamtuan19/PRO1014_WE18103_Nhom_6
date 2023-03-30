import { productsItem } from './render__Html.js';
import {service} from './service.js';


// Api render products sale home page
service.getHomeProductSale()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        const item_body = document.querySelector('.item-body')
        productsItem(data, item_body)
    })
    .catch(function (error) {
        console.log(error);
    })

// Api Products list
service.getHomeProductList()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        const product = document.querySelector('.product')
        productsItem(data, product)
    })
    .catch(function (error) {
        console.log(error);
    })
