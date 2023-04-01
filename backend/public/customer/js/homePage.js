import { productsItem, renderSubMenu } from './render__Html.js';
import { service } from './service.js';
import { hendleClickAddToCart } from './basie.js'

service.getMenu()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        console.log(data);
        renderSubMenu(data)
    })
    .catch(function (error) {
        console.log(error);
    })

// Api render products sale home page
service.getHomeProductSale()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        const item_body = document.querySelector('.item-body')
        productsItem(data, item_body)
        hendleClickAddToCart()
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
        const product = document.querySelector('.product-list')
        productsItem(data, product)
        hendleClickAddToCart()

    })
    .catch(function (error) {
        console.log(error);
    })

