import { service } from './service.js';
import { hendleClickAddToCart } from './basie.js';
import { productsItem } from './render__Html.js';

service.getShopProducts()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        const elements = document.querySelector('.products_list__items');
        productsItem(data, elements);
        hendleClickAddToCart()
    })

service.getShopProductsCategories()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        document.querySelector('.sidebar__categories').innerHTML = data.map((e) => {
            return `
                <li>
                    <a class="query__shop__products" href="?cate=${e.slug}">${e.name} (${e.product_count})</a>
                </li>
            `
        }).join('')

        document.querySelectorAll('.query__shop__products').forEach((e) => {
            e.onclick = (event) => {
                event.preventDefault();
                console.log([e]);
            };
        });


    })

console.log(window.location.search);
