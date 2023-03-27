
import { renderTotalCard, showSuccessToast } from './basie.js';

const addCart = document.querySelector('.add-to__cart');
const dataPrice = document.querySelector('.detail2-price__reduced');
const dataSale = document.querySelector('.detali2-price__original');

addCart.onclick = () => {
    const id = addCart.dataset.id;
    const code = addCart.dataset.code;

    // console.log(code);

    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

    // if (localCart.length > 0) {
    const cartItem = localCart.find(value => value.code === code);

    if (cartItem) {
        cartItem.id = id;
        cartItem.code = code;
        cartItem.price = dataPrice.dataset.price;
        cartItem.sale = dataSale.dataset.sale;
        cartItem.quantity = cartItem.quantity;
        localStorage.setItem('local-cart', JSON.stringify(localCart));
        showSuccessToast("Thêm sản phẩm thành công")
        renderTotalCard()
    }
    else {
        localCart.push(
            {
                id,
                code,
                price: dataPrice.dataset.price,
                sale: dataSale.dataset.sale,
                quantity: 1,
            }
        );

        localStorage.setItem('local-cart', JSON.stringify(localCart));
        showSuccessToast("Thêm sản phẩm thành công")
        renderTotalCard()
    }
}


