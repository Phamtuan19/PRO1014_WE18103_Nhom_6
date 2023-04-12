

import { handleClickAddToCart } from '../../handle/index.js';
import { serviceApi } from '../../service/index.js';
import { productItem } from '../../render/index.js';
import { renderDetail, renderInformation, renderImage } from './reder/information/index.js';
import { callApiComment, comment } from './comment/index.js'

const code = window.location.pathname.replace('/san-pham/', '');

let productId;

serviceApi.getPageProductDetail(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {
        productId = data[0].id
        renderDetail(data)
        handleClickAddToCart()
        callApiComment()
    })
    .catch(function (error) {
        console.log(error);
    })

serviceApi.getPageProductDetailImage(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {

        renderImage(data)
    })
    .catch(function (error) {
        console.log(error);
    })

serviceApi.getPageProductDetailIntroduce(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {
        document.querySelector('.detail__introduction').innerText = data.map(e => {
            return `${e.introduction}`
        })
    })
    .catch(function (error) {
        console.log(error);
    })


serviceApi.getPageProductDetailInformation(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {
        renderInformation(data)
    })
    .catch(function (error) {
        console.log(error);
    })

serviceApi.getPageProductDetailSuggest(code)
    .then(function (response) {
        if (response.status !== 200) {
            throw new Error(response.status);
        }
        return response.json();
    })
    .then(function (data) {

        const elem = document.querySelector('.related-book')
        productItem(data, elem)
    })
    .catch(function (error) {
        console.log(error);
    })

const keepReading = document.querySelector(".keep__reading");

keepReading.onclick = () => {
    console.log(keepReading.dataset.keep);
    if (keepReading.dataset.keep == 1) {
        keepReading.dataset.keep = 2
        keepReading.innerText = "Thu Gọn ..."
        document.querySelector(".detail__introduction").classList.add('active');
    } else {
        keepReading.dataset.keep = 1
        keepReading.innerText = "Xem Tiếp ..."
        document.querySelector(".detail__introduction").classList.remove('active');
    }
}

setTimeout(() => {

    comment(productId)
}, 2000)
