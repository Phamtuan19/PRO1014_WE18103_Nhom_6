import { renderSubMenu } from './render__Html.js';
import { service } from './service.js';

// console.log(renderSubMenu);

const addCart = document.querySelector('.add-to__cart');

addCart.onclick = () => {
    const id = addCart.dataset.id;
    const code = addCart.dataset.code;

    // console.log(code);

    const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

    // if (localCart.length > 0) {
    const cartItem = localCart.find(value => value.code === code);

    if (cartItem) {
        cartItem.id = id;
        cartItem.code = code;
        cartItem.quantity = cartItem.quantity;
        localStorage.setItem('local-cart', JSON.stringify(localCart));
        showSuccessToast()
    }
    else {
        localCart.push(
            {
                id,
                code,
                quantity: 1,
            }
        );

        localStorage.setItem('local-cart', JSON.stringify(localCart));
        showSuccessToast()
    }
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

function showSuccessToast() {
    toast({
        title: "Thành công!",
        message: "Thêm sản phẩm vào giỏ hàng thành công",
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
