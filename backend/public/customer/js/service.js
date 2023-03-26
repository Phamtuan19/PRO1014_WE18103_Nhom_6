
const baseUrl = 'http://127.0.0.1:8000/api/';

const enpoint = {
    menu: 'submenu/',
    homeProductSale: 'list/products/sale',
    homeListProduct: 'list/products',
}


export const service = {
    getMenu() {
        return fetch(baseUrl + enpoint.menu)
    },
    getHomeProductSale() {
        return fetch(baseUrl + enpoint.homeProductSale)
    },
    getHomeProductList() {
        return fetch(baseUrl + enpoint.homeListProduct)
    }
}




