import { redirectUrl } from './service.js';
import { formatCurrency } from './basie.js';
import { runShoppingCart } from './shoppingCart.js';


// Render menu header
export const renderSubMenu = (data) => {
    const navBar = document.querySelector('.nav-categories')
    const render = data.map((e) => {
        return `
            <li class="menu-child" data-id="${e.id}">
                <a href="#">${e.name}</a>
            </li>
            `
    })

    // console.log(render);
    navBar.innerHTML = render.join('');
}



// Render trang giỏ hàng
export function renderShoppingCart(data) {
    const html = data.map(e => {
        return `
            <tr style="vertical-align: middle;">
                <td>
                    <img src="${e.image[0].image_url}" alt="" style="width: 65%;">
                </td>
                <td style="text-align: left !important;">
                    <div class="form-group">
                        <input type="text" class="form-control" value="${e.name}" disabled style="border: none; padding: 3px 0; background-color: #fff; font-size: 14px">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="Tác giả: ${e.author.name}" disabled style="border: none; padding: 3px 0; background-color: #fff; color: #86868B; font-size: 14px">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="Màu sắc: RED" disabled style="border: none; padding: 3px 0; background-color: #fff;  color: #86868B;font-size: 14px">
                    </div>
                </td>

                <th class="product-price__sale" data-price ="${(e.detail.promotion_price)}" style="font-size: 14px; text-align: left !important;">${formatCurrency(e.detail.promotion_price)} đ</th>
                <th class="product-price" data-price="${(e.detail.price)}" style="font-size: 14px; text-align: left !important;">${formatCurrency(e.detail.price)}</th>

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
    deleteProductItem()
}

// Render trang đặt hàng
export function renderOrder(data, element) {
    const html = data.map(e => {
        return `
            <tr style="vertical-align: middle;">
                <td>
                    <img src="${e.image[0].image_url}" alt="" style="width: 100%;">
                </td>
                <td style="text-align: left !important;">
                    <div class="form-group">
                        <input type="text" class="form-control" value="${e.name}" disabled style="border: none; padding: 3px 0; background-color: #fff; font-size: 14px">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="Tác giả: ${e.author.name}" disabled style="border: none; padding: 3px 0; background-color: #fff; color: #86868B; font-size: 14px">
                    </div>
                </td>

                <th class="product-price" data-price="${(e.detail.price)}" style="font-size: 14px; text-align: left !important;">${(e.detail.price)} đ</th>
                <th class="product-price__sale" data-price ="${(e.detail.promotion_price)}" style="font-size: 14px; text-align: left !important;">${(e.detail.promotion_price)} đ</th>

                <td>
                    <div class="form-group quantity-product_item">

                    </div>
                </td>

                <th class="product-total__money" data-sale ="" style="font-size: 14px; text-align: left !important;"></th>
            </tr>
        `
    })

    element.innerHTML = html.join('')
}






