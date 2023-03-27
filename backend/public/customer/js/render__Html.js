import { redirectUrl } from './service.js';

export const renderSubMenu = (data) => {
    const navBar = document.querySelector('.navbar-menu')
    const menu = [];
    const render = data.map((e) => {
        let categories = []

        if (e.categories.length > 0) {
            e.categories.map((child) => {
                categories = [...categories, ` <li><a href="#">${child.name}</a></li> `]
            })
        } else {
            categories= [];
        }

        return `
            <li class="menu-child" data-id="${e.id}">
                <a href="#">${e.name}</a>
                <ul class="">
                ${categories}
                </ul>
            </li>
            `
    })

    // console.log(render);
    navBar.innerHTML = render.join('');
}

export function productsItem(data, element) {

    const html = data.map(e => {
        // console.log();
        return `
        <div class="item-child">
            <div class="item-img">
                <a href="${redirectUrl.productDetail + e.product_code}">
                    <img src="${e.image_url}"
                    alt="" width="100%" height="280px"/>
                </a>
            </div>
            <div class="item-name">
                <h4>${e.name}</h4>
            </div>
            <div class="item-author">
                <a href="#">${e.author_name}</a>
            </div>
            <div class="item-price">
                <div class="discount">
                    <span>${e.price}</span>
                    <p>${e.promotion_price}</p>
                </div>
            </div>
        </div>
        `
    })

    element.innerHTML = html.join('')
}
export function shoppintCart (data) {
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
                    <div class="form-group">
                        <input type="text" class="form-control" value="Màu sắc: RED" disabled style="border: none; padding: 3px 0; background-color: #fff;  color: #86868B;font-size: 14px">
                    </div>
                </td>

                <th class="product-price" data-price="${(e.detail.price)}" style="font-size: 14px; text-align: left !important;">${(e.detail.price)} đ</th>
                <th class="product-price__sale" data-price ="${(e.detail.promotion_price)}" style="font-size: 14px; text-align: left !important;">${(e.detail.promotion_price)} đ</th>

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
}

export function order (data, element) {
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
                    <div class="form-group">
                        <input type="text" class="form-control" value="Màu sắc: RED" disabled style="border: none; padding: 3px 0; background-color: #fff;  color: #86868B;font-size: 14px">
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

export function quantityShoppingCartItem (array) {
    const html = array.map(e => {
        return `
            <input type="number" class="form-control edit_quantity" data-code="${e.code}" value="${e.quantity}" data-code="" min="1" max="99" style="width: 60px; padding: 6px 10px; background-color: #f5f5f7; font-size: 14px">
        `
    })

    document.querySelectorAll(".quantity-product_item").forEach((item, index) => {
        item.innerHTML = html[index];
    })
}
