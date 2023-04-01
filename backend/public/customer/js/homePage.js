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
        const item_body = document.querySelector('.swiper-wrapper')
        productListHome(data, item_body)
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

function productListHome(data, element) {

    const html = data.map(e => {
        // console.log();
        return `
            <div class="swiper-slide item-child">
                <div class="item-img">
                    <div class="sale">30%</div>
                    <img class="product-image" src="${e.image_url}" alt="" />
                    <button class="btn add-to__cart" data-id="${e.id}" data-code="${e.product_code}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Thêm giỏ hàng
                    </button>
                </div>
                <div class="item-title">
                    <div class="item-name">
                        <p class="product_name">${e.name}</p>
                    </div>
                    <div class="item-author">
                        <a href="#">${e.author_name}</a>
                    </div>
                    <div class="item-price">
                        <div class="discount">
                            <p class="price_sale">${e.price}</p>
                            <span class="price">${e.promotion_price}</span>
                        </div>
                    </div>
                </div>
            </div>
            `
    })

    element.innerHTML = html.join('')
}
