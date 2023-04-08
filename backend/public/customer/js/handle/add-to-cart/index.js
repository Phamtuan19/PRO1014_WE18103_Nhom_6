
import {showErrorToast, showSuccessToast } from '../../message/index.js';
import { renderTotalCard } from '../../render/index.js';
import callApiMiniCart from '../../Layout/header/car-mini/index.js';

// Add To Cart
function handleClickAddToCart() {
    const addCart = document.querySelectorAll('.add-to__cart');
    if (addCart) {
        addCart.forEach((item, index) => {
            item.addEventListener('click', (event) => {
                event.preventDefault();

                const id = item.dataset.id;
                const code = item.dataset.code;

                const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

                const cartItem = localCart.find(value => value.code === code);

                if (!cartItem) {
                    localCart.push(
                        {
                            id,
                            code,
                            quantity: 1,
                        }
                    );

                    localStorage.setItem('local-cart', JSON.stringify(localCart));
                    callApiMiniCart()
                    showSuccessToast("Thêm sản phẩm thành công")
                    renderTotalCard()
                }

                if (cartItem) {
                    showErrorToast("Sản phẩm đã tồn tại trong giỏ hàng!")
                }
            })
        })
    }
}

export default handleClickAddToCart
