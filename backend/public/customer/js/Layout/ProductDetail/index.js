
import { formatCurrency } from '../../method/index.js';
import { handleClickAddToCart } from '../../handle/index.js';
import { serviceApi } from '../../service/index.js';
import { productItem } from '../../render/index.js';

const code = window.location.pathname.replace('/san-pham/', '');

serviceApi.getPageProductDetail(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {
        renderDetail(data)
        // handleClickAddToCart()
    })
    .catch(function (error) {
        console.log(error);
    })

serviceApi.getPageProductDetailImage(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {
        console.log(data);
        renderImage(data)
    })
    .catch(function (error) {
        console.log(error);
    })

serviceApi.getPageProductDetailIntroduce(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {
        document.querySelector('.detail__introduction').innerText = data.map(e => {
            return `${e.introduction}`
        })
    })
    .catch(function (error) {
        console.log(error);
    })


serviceApi.getPageProductDetailInformation(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {
        renderInformation(data)
    })
    .catch(function (error) {
        console.log(error);
    })

serviceApi.getPageProductDetailSuggest(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {
        console.log(data);
        const elem = document.querySelector('.related-book')
        productsItem(data, elem)
    })
    .catch(function (error) {
        console.log(error);
    })

const keepReading = document.querySelector(".keep__reading");

keepReading.onclick = () => {
    console.log(keepReading.dataset.keep);
    if (keepReading.dataset.keep == 1) {
        keepReading.dataset.keep = 2
        keepReading.innerText = "Thu Gọn ..."
        document.querySelector(".detail__introduction").classList.add('active');
    } else {
        keepReading.dataset.keep = 1
        keepReading.innerText = "Xem Tiếp ..."
        document.querySelector(".detail__introduction").classList.remove('active');
    }
}

function renderDetail(data) {
    const html = data.map((e) => {
        return `
            <div class="detail2-title">
                <h3 class="product__name">${e.name}</h3>
            </div>
            <div class="detail2-author">
                <p>Tác giả: <a href="#">${e.author_name}</a></p>
                <p>Lĩnh vực: <a href="#">${e.categories_name}</a></p>
                <p>Nhà xb: <a href="#">${e.publishing_house_name}</a></p>
                <p>Đã bán: <a href="#">${e.quantity_sold === null ? "" : e.quantity_sold + "Sp"} </a></p>
                <p>Tình trạng: <a href="#">${e.quantity_sold != 0 ? 'còn hàng' : 'hết hàng'}</a></p>
            </div>
            <span class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9733;(0 đánh giá)
                <a href="#">Click để đánh giá</a>
            </span>
            <div class="detail2-price">
                <p class="detail2-price__reduced" data-price="${e.promotion_price}">${formatCurrency(e.promotion_price)}</p>
                <span class="detali2-price__original" data-sale="${e.price}">${formatCurrency(e.price)}</span>
            </div>
            <p class="transport">Giảm 30% phí vận chuyển bởi Nhất Tín Express(NTX)</p>

            <div class="btn-add__cart">
                <button class="btn add__cart btn-primary">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Mua ngay
                </button>
                <button class="add-to__cart btn" data-id="${e.id}"
                    data-code="${e.product_code}">
                    Cho vào giỏ hàng
                    <i class="fa-solid fa-cart-shopping"></i>
                </button>
            </div>
        `
    })

    document.querySelector(".product_detail__info").innerHTML = html.join("")
}

function renderImage(data) {
    const html = data.map((e) => {
        return `
            <img src="${e.image_url}" class="image_product__detail" />
        `
    })

    document.querySelector('.detail-box1_img').innerHTML = html.join("")
}

function renderInformation(data) {
    document.querySelector('.table-striped').innerHTML = `
        <tbody class="tbody__table__detail">
            <tr>
                <th scope="col" width="30%">Nhà Xuất bản</th>
                <th scope="col">${data[0].publishing_house_name}</th>
            </tr>
            <tr>
                <th scope="col" width="30%">Ngày xuất bản:</th>
                <th scope="col">${data[0].publication_date}</th>
            </tr>
            <tr>
                <th scope="col" width="30%">Kích thước:</th>
                <th scope="col">${data[0].size}</th>
            </tr>
            <tr>
                <th scope="col" width="30%">Số trang:</th>
                <th scope="col">${data[0].page_number} trang</th>
            </tr>
            <tr>
                <th scope="col" width="30%">Trọng lượng:</th>
                <th scope="col">${data[0].weight}g</th>
            </tr>
        </tbody>
        `
}
