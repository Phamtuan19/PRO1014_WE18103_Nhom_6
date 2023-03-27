
const baseUrlAPi = 'http://127.0.0.1:8000/api/';
const baseUrl = 'http://127.0.0.1:8000/';

export const enpoint = {
    menu: 'submenu/',
    homeProductSale: 'list/products/sale',
    homeListProduct: 'list/products',
    shoppingCart: 'shopping/cart',
    order: 'order'
}

export const redirectUrl = {
    home: `${baseUrl}home`,
    productDetail: `product-detail/`,
}

console.log(baseUrlAPi + enpoint.order);

export const service = {
    getMenu() {
        return fetch(baseUrlAPi + enpoint.menu)
    },
    getHomeProductSale() {
        return fetch(baseUrlAPi + enpoint.homeProductSale)
    },
    getHomeProductList() {
        return fetch(baseUrlAPi + enpoint.homeListProduct)
    },
    getShoppingCart(product_code) {
        return fetch(baseUrlAPi + enpoint.shoppingCart + `?code=${product_code}`)
    },
    postOrder(data) {
        return fetch(baseUrlAPi + enpoint.order, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
    }
}




