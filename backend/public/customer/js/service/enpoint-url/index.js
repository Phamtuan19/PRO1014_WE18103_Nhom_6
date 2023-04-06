import { baseUrl } from "../baseUrl/index.js";

const enpointUrl = {
    home: `${baseUrl}trang-chu`,
    login: `${baseUrl}customer/login`,
    pageProducts() {
        return baseUrl + 'danh-sach-san-pham?';
    },
    productDetail(code) {
        return baseUrl + 'san-pham/' + code;
    },
}

export default enpointUrl;
