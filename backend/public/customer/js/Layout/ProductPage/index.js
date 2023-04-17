import { serviceApi, enpointUrl } from '../../service/index.js';
import { productItem } from '../../render/index.js';

let url = window.location.search;


function callApiRenderProducts(filter = '') {
    serviceApi.getPageProducts(filter)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            const elements = document.querySelector('.products_list__items');
            productItem(data.data, elements, 4);
            pagination(data)
            rederOptionFilter()
        })
        .catch(function (error) {
            console.log(error);
        })
}

callApiRenderProducts(url)

function pagination(data) {
    console.log(data);

    const { current_page, last_page } = data;

    document.querySelector(".product__pagination").innerHTML = `
        <a class="product__pagination__links" href="#"
            data-key="page" data-value="${current_page === 1 ? 1 : current_page - 1}" disabled="disabled">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <a class="product__pagination__links active" href="${window.location.href + '&page=' + current_page}"
                data-key="page" data-value="${current_page}">${current_page}</a>
        <a class="product__pagination__links" href="?&page= ${current_page + 1}"
                data-key="page" data-value="${current_page === last_page ? last_page : current_page + 1}">
                <i class="fa-solid fa-arrow-right"></i>
        </a>
    `

    document.querySelectorAll(".product__pagination__links").forEach(e => {
        e.onclick = (event) => {
            event.preventDefault();
            const queryString = fliterSiderBar(e)
            callApiRenderProducts(queryString)
        }
    })
}

// function categories() {
serviceApi.getShopProductsCategories()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        document.querySelector('.sidebar__categories').innerHTML = data.map((e) => {
            return `
                <li>
                    <a class="query__shop__products" href="?danh-muc=${e.slug}" data-key="danh-muc" data-value="${e.slug}">${e.name} (${e.product_count})</a>
                </li>
            `
        }).join('')

        handleFilter()
    })

// APi Author
serviceApi.getProductsAuthor()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        document.querySelector('.sidebar__author').innerHTML = data.map((e) => {
            return `
            <li>
                <a class="query__shop__products" href="?tac-gia=${e.slug}" data-key="tac-gia" data-value="${e.slug}">${e.name} (${e.product_count})</a>
            </li>
        `
        }).join('')

        handleFilter()
    })

fetch('http://127.0.0.1:8000/api/page-product/fliter-publishing-house')
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {

        document.querySelector('.sidebar__publishing-house').innerHTML = data.map((e) => {
            return `
            <li>
                <a class="query__shop__products" href="?nha-xuat-ban=${e.slug}" data-key="nha-xuat-ban" data-value="${e.slug}">${e.name} (${e.product_count})</a>
            </li>
        `
        }).join('')

        handleFilter()
    })


const see_more = document.querySelectorAll('.m-show-more-action');
const children_categories = document.querySelectorAll('.children-categories');

see_more.forEach((e, index) => {
    e.onclick = () => {
        children_categories[index].classList.toggle('height-auto');
        e.innerText == 'Thu gọn' ? e.innerText = 'Xem thêm' : e.innerText = 'Thu gọn';
    }
})


function handleFilter() {
    setTimeout(() => {

        document.querySelectorAll('.query__shop__products').forEach((item) => {
            item.onclick = (event) => {
                // item.localName === 'a' ? event.preventDefault() : false;
                event.preventDefault();

                const queryString = fliterSiderBar(item)
                callApiRenderProducts(queryString)
            };
        });
    }, 1000);
}

function handleTogaleFilter () {
    document.querySelectorAll('.card-heading').forEach((e, index) => {
        e.onclick = () => {
            document.querySelectorAll('.card-body')[index].classList.toggle('d-none');
        }
    })
}

handleTogaleFilter()

function handleChangeSort() {
    const orderBy = document.querySelector("#order__by");
    orderBy.onchange = (event) => {
        orderBy.dataset.value = orderBy.value
        const queryString = fliterSiderBar(orderBy)
        callApiRenderProducts(queryString)
    }
}
function handleChangePagination() {
    const pagination = document.querySelector("#pagination");
    pagination.onchange = (event) => {
        pagination.dataset.value = pagination.value
        const queryString = fliterSiderBar(pagination)
        callApiRenderProducts(queryString)
    }
}

handleChangeSort()
// handleChangePagination()

function fliterSiderBar(item) {
    const obj = getUrlToObject(item);

    obj[item.dataset.key] = item.dataset.value;

    return changeUrl(obj);
}


// get key search Url convert to Object
function getUrlToObject() {
    let urlSearch = ((String(window.location.search)).replace("?", '')).split('&');
    var obj = {};

    if (urlSearch.length > 0) {
        urlSearch.forEach(item => {
            if (item !== "" && item !== undefined) {
                const [key, value] = item.split('=');
                obj[key] = decodeURIComponent(value);
            }
        })
    }

    return obj;
}

// Convert Object to Array => render Option client
function rederOptionFilter() {
    const obj = getUrlToObject()
    const arrayFilter = Object.entries(obj); // convert object to array
    const product__option = document.querySelector(".shop__product__option__left")
    product__option.innerHTML = arrayFilter.map((e) => { // render option url
        if (e[0] !== "sort" && e[0] !== "pagination") {
            return `
                <span class="btn">
                    ${e[0]}
                    <i class="fa-solid fa-xmark delete__option" data-key="${e[0]}"></i>
                </span>
            `
        }
    }).join("")

    handleRemoveOption()
}

function changeUrl(obj) {
    const queryParams = [];
    for (const key in obj) { // convert object to array[key = value]
        const value = obj[key];
        queryParams.push(`${encodeURIComponent(key)}=${encodeURIComponent(value)}`);
    }
    let queryString = queryParams.join('&'); // join("&") array nối với &

    // Thay đổi url
    const url = enpointUrl.pageProducts();
    const newUrl = url + queryString;
    const newState = { page: 'new-page' }; // trạng thái mới
    history.pushState(newState, '', newUrl); // thay đổi action của URL

    return queryString
}



function handleRemoveOption() {
    const url = enpointUrl.pageProducts(); // Url Call Api

    const delete__option = document.querySelectorAll(".delete__option");

    if (delete__option.length > 0) {
        delete__option.forEach(e => {
            e.onclick = () => {

                let urlSearch = ((String(window.location.search)).replace("?", '')).split('&');
                let obj = {};

                if (urlSearch.length > 0) {
                    urlSearch.forEach(item => {
                        if (item !== "" && item !== undefined) {
                            const [key, value] = item.split('=');
                            obj[key] = decodeURIComponent(value);
                        }
                    })
                }

                delete obj[e.dataset.key];

                const queryString = changeUrl(obj)
                callApiRenderProducts(queryString)

                return queryString;
            }
        })
    }
}


