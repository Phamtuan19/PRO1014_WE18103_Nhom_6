

/*
*
*   Delete product cart items
*
*/

import runShoppingCart from '../../Layout/ShoppingPage/index.js';
import { renderTotalCard } from '../../render/index.js';
import callApiMiniCart from '../../Layout/header/car-mini/index.js'

// Xóa sản phẩm trong giỏ hàng
function deleteCartItem() {
    const deleteItem = document.querySelectorAll('.remove_product');
    const localCart = JSON.parse(localStorage.getItem("local-cart"));

    if (localCart.length > 0) {
        deleteItem.forEach((e) => {
            e.onclick = () => {
                const code = e.getAttribute('data-code');
                const cartItem = localCart.filter(value => value.code !== code);

                if (cartItem) {
                    localStorage.setItem("local-cart", JSON.stringify(cartItem));
                    runShoppingCart()
                    renderTotalCard()
                    callApiMiniCart()
                }
            }
        })
    }
}

export default deleteCartItem;
