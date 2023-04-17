
import { enpointUrl } from '../../../service/index.js';
import { formatCurrency } from '../../../method/index.js';
import { showErrorToast, showSuccessToast } from '../../../message/index.js';
import { renderTotalCard } from '../../../render/index.js';
import callApiMiniCart from '../../../Layout/header/car-mini/index.js';

function productItemList(data, element, colNumber) {

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
                        <span class="add-to__cart_list" data-id="${e.id}" data-code="${e.product_code}">+ Thêm vào giỏ hàng</span>
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

    handleClickAddToCart();
}

// Add To Cart
function handleClickAddToCart() {
    const addCart = document.querySelectorAll('.add-to__cart_list');
    console.log(addCart);
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

function renderPostList (data) {
    const html = data.map(e => {
        return `
            <div class="col-4 " style="">
                <div class="post_items">
                    <a href="http://127.0.0.1:8000/bai-viet/${e.slug}" style="color: #111111;">
                        <div class="mt-3 set-bg"
                            style="width: 100%;height: 200px; background-image: url('${e.image_url}');">
                        </div>
                        <div class="mt-3">
                            <h5 class="post_item_name">
                                ${e.title}
                            </h5>
                            <p class="introduction">
                                ${e.introduction}
                            </p>
                            <div class="post_item__detail">
                                <p class="post_item_author">${e.user_name}</p>
                                <p class="post_item_created_at">${e.created_at}</p>
                                <p class="post_item_created_view">view: ${e.view}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        `
    })

    document.querySelector('.featured_posts').innerHTML = html.join('')
}

export { productItemList, renderPostList };
