
import { baseUrlAPi } from "../baseUrl/index.js";
import enpointApi from "../enpoint-api/index.js";

const serviceApi = {
    getMenu() {
        return fetch(baseUrlAPi + enpointApi.menu)
    },
    getShoppingCart(product_code) {
        return fetch(baseUrlAPi + enpointApi.shoppingCart + `?code=${product_code}`)
    },

    // Page Home
    getHomeProductSale(orderBy = null) {
        return fetch(baseUrlAPi + enpointApi.pageHomeProductFilter + '?orderBy=' + orderBy)
    },
    getHomeProductList() {
        return fetch(baseUrlAPi + enpointApi.pageHomeProductList)
    },

    // Page Order
    postOrder(data) {
        return fetch(baseUrlAPi + enpointApi.order, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
    },
    // Page Products Details
    getPageProductDetail(code) {
        return fetch(baseUrlAPi + enpointApi.pageProductDetail + code)
    },
    getPageProductDetailImage(code) {
        return fetch(baseUrlAPi + enpointApi.pageProductDetailImage + code)
    },
    getPageProductDetailIntroduce(code) {
        return fetch(baseUrlAPi + enpointApi.pageProductDetailIntroduce + code)
    },
    getPageProductDetailInformation(code) {
        return fetch(baseUrlAPi + enpointApi.pageProductDetailInformation + code)
    },
    getPageProductDetailSuggest(code) {
        return fetch(baseUrlAPi + enpointApi.pageProductDetailSuggest + code)
    },

    // Page Danh sách sản phẩm
    getPageProducts(filter = '') {
        return fetch(baseUrlAPi + enpointApi.pageProducts + filter)
    },
    getShopProductsCategories(data = '') {
        return fetch(baseUrlAPi + enpointApi.shopProductsCategories + '?' + data)
    },
    getProductsAuthor() {
        return fetch(baseUrlAPi + enpointApi.pageProductsAuthor);
    },
}

export default serviceApi;
