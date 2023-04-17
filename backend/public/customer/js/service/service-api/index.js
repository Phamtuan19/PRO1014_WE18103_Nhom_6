
import { baseUrlAPi } from "../baseUrl/index.js";
import enpointApi from "../enpoint-api/index.js";

const serviceApi = {
    // Auth
    postLogin(data) {
        return fetch(baseUrlAPi + enpointApi.login, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
    },
    postLogout(token) {
        return fetch(baseUrlAPi + enpointApi.logout, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
        })
    },
    postRegister(data) {
        return fetch(baseUrlAPi + enpointApi.register, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
    },
    patchResetPassword(data) {
        return fetch(baseUrlAPi + enpointApi.resetPassword, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        })
    },
    getAuthListOrder(token) {
        return fetch(baseUrlAPi + enpointApi.authListOrder, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
        })
    },
    patchComfirmPassword(password) {
        return fetch(baseUrlAPi + enpointApi.confirmPassword, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(password),
        })
    },
    patchUpdateUser(id, token, data) {
        return fetch(baseUrlAPi + enpointApi.userUpdate + id, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(data)
        })
    },
    patchUpdatePassword(id, token, data) {
        return fetch(baseUrlAPi + enpointApi.userUpdatePassword + id, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(data)
        })
    },

    //
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
