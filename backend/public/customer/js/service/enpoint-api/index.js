const enpointApi = {

    // Auth
    login: 'customer/login',
    logout: 'customer/logout',
    register: 'customer/register',
    resetPassword: 'rest-password',
    confirmPassword: 'comfirm-password',
    userUpdate: 'user/update/',
    userUpdatePassword: 'user/update/password/',
    authListOrder: 'list-order',
    //
    // menu: 'submenu/',
    pageHomeProductFilter: 'page-home/products-filter-controls',
    pageHomeProductList: 'page-home/products-list',
    shoppingCart: 'shopping/cart',
    order: 'order',

    // Page Products
    // pageProducts: 'page-product/products-list?',
    pageProducts: 'danh-sach-san-pham?',
    shopProductsCategories: 'page-product/fliter-categories',
    pageProductsAuthor: 'page-product/fliter-auhtor',

    // Product-detai
    pageProductDetailImage: 'page-product-detail-image/',
    pageProductDetail: 'page-product-detail-info/',
    pageProductDetailIntroduce: 'page-product-detail-introduce/',
    pageProductDetailInformation: 'page-product-detail-information/',
    pageProductDetailSuggest: 'page-product-details-suggest/',

}

export default enpointApi;
