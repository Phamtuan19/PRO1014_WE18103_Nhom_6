import { renderSubMenu } from './render__Html.js';
import { service } from './service.js';

// console.log(renderSubMenu);

service.getMenu()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        renderSubMenu(data)
    })
    .catch(function (error) {
        console.log(error);
    })


export function renderTotalCard() {
    let localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

    document.querySelector('.cart-total__quantity').innerText = localCart.length
}
renderTotalCard()


export function cartTotals() {
    const productPrice = document.querySelectorAll('.product-price')
    const productPriceSale = document.querySelectorAll('.product-price__sale')
    const editQuantity = document.querySelectorAll('.edit_quantity')
    const totalMoney = document.querySelectorAll('.product-total__money')

    totalMoney.forEach((e, index) => {
        let money = productPriceSale[index].dataset.price ?
            (productPriceSale[index].dataset.price * editQuantity[index].value) :
            (productPrice[index].dataset.price * editQuantity[index].value)

        e.innerText = money;
        e.dataset.money = money;
    })
    // console.log(totalMoney);
    const totalMoneyItems = [];
    totalMoney.forEach((e) => {
        totalMoneyItems.push(e.dataset.money);
    })

    const totalMoneyCart = totalMoneyItems.reduce(
        (accumulator, currentValue) => accumulator + Number(currentValue),
        0
    )

    document.querySelector('.total-payment').value = totalMoneyCart
}


export function hendleClickQuantity() {
    const editQuantity = document.querySelectorAll('.edit_quantity')

    editQuantity.forEach(e => {
        e.onchange = () => {
            const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];
            console.log(e);
            // if (localCart.length > 0) {
            const cartItem = localCart.find(value => value.code === e.dataset.code);
            console.log(cartItem);
            if (cartItem) {
                cartItem.id = cartItem.id;
                cartItem.code = cartItem.code;
                cartItem.quantity = e.value;
                localStorage.setItem('local-cart', JSON.stringify(localCart));
                renderTotalCard()
                cartTotals()
            }
        }
    })
}

// Toast function
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    console.log('toast');
    const main = document.getElementById("toast");
    if (main) {
        const toast = document.createElement("div");

        // Auto remove toast
        const autoRemoveId = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);

        // Remove toast when clicked
        toast.onclick = function (e) {
            if (e.target.closest(".toast__close")) {
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        };

        const icons = {
            success: "fas fa-check-circle",
            info: "fas fa-info-circle",
            warning: "fas fa-exclamation-circle",
            error: "fas fa-exclamation-circle"
        };
        const icon = icons[type];
        const delay = (duration / 1000).toFixed(2);

        toast.classList.add("toast", `toast--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

        toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
        main.appendChild(toast);
    }
}

export function showSuccessToast() {
    toast({
        title: "Thành công!",
        message: "Thêm sản phẩm thành công!",
        type: "success",
        duration: 5000
    });
}

function showErrorToast() {
    toast({
        title: "Thất bại!",
        message: "Có lỗi xảy ra, vui lòng liên hệ quản trị viên.",
        type: "error",
        duration: 5000
    });
}
