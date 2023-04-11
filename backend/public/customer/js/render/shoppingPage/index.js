
import { formatCurrency } from '../../method/index.js';
import { deleteCartItem } from '../../handle/index.js';
import quantityShoppingCartItem from './input-quantity-cart/index.js';

// Render trang đặt hàng
function shoppingCart(data, array) {
    const html = data.map(e => {
        return `
            <tr style="vertical-align: middle;">
                <td>
                    <img src="${e.image_url}" alt="" style="width: 65%;">
                </td>
                <td style="text-align: left !important;">
                    <div class="form-group">
                        <input type="text" class="form-control" value="${e.name}" disabled style="border: none; padding: 3px 0; background-color: #fff; font-size: 14px">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="Tác giả: ${e.author_name}" disabled style="border: none; padding: 3px 0; background-color: #fff; color: #86868B; font-size: 14px">
                    </div>
                </td>

                <th class="product-price__sale" data-price ="${(e.promotion_price)}" style="font-size: 14px; text-align: left !important;">${formatCurrency(e.promotion_price)} đ</th>
                <th class="product-price" data-price="${(e.price)}" style="font-size: 14px; text-align: left !important;">${formatCurrency(e.price)}</th>

                <td>
                    <div class="form-group quantity-product_item">

                    </div>
                </td>

                <th class="product-total__money" data-sale ="" style="font-size: 14px; text-align: left !important;"></th>

                <td>
                    <i class="fa-solid fa-trash remove_product" style="color: #86868B" data-code="${e.product_code}" ></i>
                </td>
            </tr>
        `
    })

    document.querySelector('.cart-table_body').innerHTML = html.join('')

    quantityShoppingCartItem(array)

    deleteCartItem()
}


export default shoppingCart
