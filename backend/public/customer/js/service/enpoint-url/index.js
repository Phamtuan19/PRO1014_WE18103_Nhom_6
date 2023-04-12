import { baseUrl } from "../baseUrl/index.js";

const enpointUrl = {
    home: `${baseUrl}trang-chu`,
    login: `${baseUrl}customer/login`,
    register: `${baseUrl}customer/dang-ky`,
    resetPassword: `${baseUrl}quen-mat-khau`,
    userInfo: `${baseUrl}tai-khoan`,
    userOrderPage: `${baseUrl}san-pham-da-mua`,
    postList: `${baseUrl}bai-viet`,
    postItem(slug) {
        return `${baseUrl}bai-viet/${slug}`;
    },
    pageProducts() {
        return baseUrl + 'danh-sach-san-pham?';
    },
    productDetail(code) {
        return baseUrl + 'san-pham/' + code;
    },
    shoppingCart: `${baseUrl}shopping/cart`,
    order: `${baseUrl}order`,
}

export default enpointUrl;
