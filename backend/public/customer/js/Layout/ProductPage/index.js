import { serviceApi, enpointUrl } from '../../service/index.js';
import { productItem } from '../../render/index.js';

function callApiRenderProducts(filter = '') {
    serviceApi.getPageProducts(filter)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            console.log(data);
            const elements = document.querySelector('.products_list__items');
            productItem(data.data, elements);
            pagination(data)
            rederOptionFilter()
        })
        .catch(function (error) {
            console.log(error);
        })
}

callApiRenderProducts()

function pagination(data) {
    const html = data.links.map((e, index) => {
        if (index !== 0 && index !== data.links.length - 1 && index < 3 || index === data.links.length -2 ) {
            return `
                <a class="product__pagination__links ${index === data.current_page ? "active" : ""}" href="${e.url}" data-key="page" data-value="${e.label}">${e.label}</a>
            `
        }else if (index > 3 && index < data.links.length - 2 ) {
            return `
                <span>....</span>
            `
        }
    })

    console.log(html);

    document.querySelector(".product__pagination").innerHTML = html.join('')

    document.querySelectorAll(".product__pagination__links").forEach(e => {
        // console.log(e);
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
                <a class="query__shop__products" href="?danh-muc=${e.slug}" data-key="tac-gia" data-value="${e.slug}">${e.name} (${e.product_count})</a>
            </li>
        `
        }).join('')

        handleFilter()
    })


function handleFilter() {
    document.querySelectorAll('.query__shop__products').forEach((item) => {
        item.onclick = (event) => {
            item.localName === 'a' ? event.preventDefault() : false;

            const queryString = fliterSiderBar(item)
            callApiRenderProducts(queryString)
        };
    });
}


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
handleChangePagination()

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

    console.log([delete__option]);

    if (delete__option.length > 0) {
        delete__option.forEach(e => {
            e.onclick = () => {
                console.log(e);

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

                console.log(obj);
                const queryString = changeUrl(obj)
                callApiRenderProducts(queryString)

                return queryString;
            }
        })
    }
}

