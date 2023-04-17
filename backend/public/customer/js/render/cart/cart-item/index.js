
/*
*
*   Render CartItem
*
*/

import { formatCurrency } from '../../../method/index.js';
import { enpointUrl } from '../../../service/index.js';



function cartItem(data, cartMini) {

    // if (data.length > 0) {
    cartMini.innerHTML = data.map((e, index) => {

        if (index <= 2) {
            return `
                    <a class="cart__mini__item" href="${enpointUrl.productDetail(e.product_code)}">
                        <div class="cart-item">
                            <div class="cart-item__image" style="background-image: url('${e.image_url}');"></div>
                            <div class="cart-item__info">
                                <p class="item__info__name">${e.name}</p>
                                <div class="cart-item__price">
                                    <p class="item__price__original" data-sale="${e.promotion_price}">${formatCurrency(e.promotion_price)}</p>
                                    <p class="item__price" data.price="${e.price}">${formatCurrency(e.price)}</p>
                                </div>
                            </div>
                            <div class="cart-item__quantity">
                                <span class="item__quantity" data-code="${e.product_code}" data-quantity="1">1</span>
                            </div>
                        </div>
                    </a>
                `
        }
    }).join('')
    renderQuantityCartMini();
}

function renderQuantityCartMini() {
    const item__quantity = document.querySelectorAll('.item__quantity');
    let localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
    item__quantity.forEach(e => {
        localCart.find(item => {
            if(item.code === e.dataset.code){
                e.innerText = item.quantity
            }
        })
    })
}

export default cartItem;
