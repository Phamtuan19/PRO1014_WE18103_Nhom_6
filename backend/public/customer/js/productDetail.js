
import { renderTotalCard, showSuccessToast, showErrorToast } from './basie.js';
import { service } from './service.js';
import { slideshow } from './slideshow.js';

const addCart = document.querySelector('.add-to__cart');

function imageProduct() {
    const code = window.location.pathname.replace('/product-detail/', '');

    service.getImgaeProduct(code)
        .then(function (response) {
            if (response.status !== 200) {
                throw new Error(response.status);
            }
            return response.json();
        })
        .then(function (data) {
            slideshow(data)
        })
        .catch(function (error) {
            console.log(error);
        })
}

imageProduct()

addCart.onclick = () => {
    const id = addCart.dataset.id;
    const code = addCart.dataset.code;

    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

    const cartItem = localCart.find(value => value.code === code);

    if (cartItem) {
        cartItem.id = id;
        cartItem.code = code;
        cartItem.quantity = cartItem.quantity;
        localStorage.setItem('local-cart', JSON.stringify(localCart));
        showErrorToast("Sản phẩm đã tồn tại")
        renderTotalCard()
    }
    else {
        localCart.push(
            {
                id,
                code,
                quantity: 1,
            }
        );

        localStorage.setItem('local-cart', JSON.stringify(localCart));
        showSuccessToast("Thêm sản phẩm thành công")
        renderTotalCard()
    }
}


