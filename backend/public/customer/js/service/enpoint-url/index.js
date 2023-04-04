import { baseUrl } from "../baseUrl/index.js";

const enpointUrl = {
    home: `${baseUrl}home`,
    pageProducts() {
        return baseUrl + 'danh-sach-san-pham?';
    },
    productDetail(code) {
        return baseUrl + 'san-pham/' + code;
    },
}

export default enpointUrl;
