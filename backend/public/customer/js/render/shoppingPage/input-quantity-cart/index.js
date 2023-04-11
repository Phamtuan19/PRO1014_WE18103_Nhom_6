
import { enpointUrl } from "../../../service/index.js";

// Dislable number product cart
export default function quantityShoppingCartItem(array) {
    console.log('a');
    if (window.location.href === enpointUrl.order) {
        const html = array.map(e => {
            return `
                <input type="number" class="form-control edit_quantity" disabled data-code="${e.code}" value="${e.quantity}" data-code="" min="1" max="99" style="width: 60px; padding: 6px 10px; background-color: #f5f5f7; font-size: 14px">
            `
        })

        document.querySelectorAll(".quantity-product_item").forEach((item, index) => {
            item.innerHTML = html[index];
            console.log(item);
        })
    } else {
        const html = array.map(e => {
            return `
            <input type="number" class="form-control edit_quantity" data-code="${e.code}" value="${e.quantity}" data-code="" min="1" max="99" style="width: 60px; padding: 6px 10px; background-color: #f5f5f7; font-size: 14px">
        `
        })
        document.querySelectorAll(".quantity-product_item").forEach((item, index) => {
            item.innerHTML = html[index];
        })
    }
}
