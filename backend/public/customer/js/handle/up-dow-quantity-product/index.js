
import { cartTotalsMoney, renderTotalCard } from '../../render/index.js';

// Tăng giảm số lượng sản phẩm và giới hạn số sản phẩm
function hendleClickQuantity() {
    const editQuantity = document.querySelectorAll('.edit_quantity')

    editQuantity.forEach(e => {
        e.onchange = () => {
            const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

            // if (localCart.length > 0) {
            const cartItem = localCart.find(value => value.code === e.dataset.code);

            if (cartItem) {

                if (e.value <= 20) {
                    cartItem.id = cartItem.id;
                    cartItem.code = cartItem.code;
                    cartItem.quantity = e.value;
                    localStorage.setItem('local-cart', JSON.stringify(localCart));
                    // renderShoppingCart()
                    renderTotalCard()
                    cartTotalsMoney()
                } else {
                    console.log("vui lòng liên hệ với quản trị viên để đặt hàng số lượng lớn");
                    e.value = 20;
                }

            }
        }
    })
}

export default hendleClickQuantity
