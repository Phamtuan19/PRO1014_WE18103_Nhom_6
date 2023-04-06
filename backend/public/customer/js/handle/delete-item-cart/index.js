import { runShoppingCart } from '../../Layout/ShoppingPage/index.js';
import { renderTotalCard } from '../../render/index.js';


// Xóa sản phẩm trong giỏ hàng
function deleteCartItem() {
    const deleteItem = document.querySelectorAll('.remove_product');
    const localCart = JSON.parse(localStorage.getItem("local-cart"));

    deleteItem.forEach((e) => {
        e.onclick = () => {
            const code = e.getAttribute('data-code');
            const cartItem = localCart.filter(value => value.code !== code);

            if (cartItem) {
                localStorage.setItem("local-cart", JSON.stringify(cartItem));
                runShoppingCart()
                renderTotalCard()
            }
        }
    })
}

export default deleteCartItem;
