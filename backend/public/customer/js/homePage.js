import { productsItem } from './render__Html.js';
import { service } from './service.js';
import { hendleClickAddToCart, formatCurrency } from './basie.js'

// Api render products sale home page
service.getHomeProductSale()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        const item_body = document.querySelector('.product-sale__test')
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
        const product = document.querySelector('.product-list__test')
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
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg"
                        style="background-image: url('${e.image_url}');">
                        <ul class="product__hover">
                            <li>
                                <a href="#">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-right-left"></i>
                                    <span>Compare</span></a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6 class="product__item__name">${e.name}</h6>
                        <a href="#" class="add-cart add-to_cart">+ Add To Cart</a>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="d-flex align-items-center">
                        <h5 class="product-price" data-price="${(e.price)}" style="margin-right: 12px">${formatCurrency(e.price)}</h5>
                        <h6 class="product-price__sale" data-price="${(e.promotion_price)}" style="color:red">${formatCurrency(e.promotion_price)}</h6>
                        </div>
                    </div>
                </div>
            </div>
            `
    })

    element.innerHTML = html.join('')
}
