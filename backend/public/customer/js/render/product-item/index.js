
import { enpointUrl } from '../../service/index.js';
import { formatCurrency } from '../../method/index.js';
import { handleClickAddToCart } from '../../handle/index.js';


function productItem(data, element, colNumber, callBack) {

    const html = data.map(e => {
        return `
            <div class="col-lg-${colNumber ? colNumber : 3} col-md-4 col-sm-6">
                <div class="product__item">
                    <a href="${enpointUrl.productDetail(e.product_code)}">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg"
                            style="background-image: url('${e.image_url}');">
                        </div>
                    </a>
                    <div class="product__item__text">
                        <h6 class="product__item__name">${e.name}</h6>
                        <span class="add-to__cart" data-id="${e.id}" data-code="${e.product_code}">+ Thêm vào giỏ hàng</span>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="d-flex align-items-center">
                        <h5 class="product-price" data-price="${(e.promotion_price)}" style="margin-right: 12px">${formatCurrency(e.promotion_price)}</h5>
                        <h6 class="product-price__sale" data-price="${(e.price)}" style="color:red">${formatCurrency(e.price)}</h6>
                        </div>
                    </div>
                </div>
            </div>
        `
    });
    element.innerHTML = html.join('');

    handleClickAddToCart()
}



export default productItem;
