
import { service } from './service.js';
import { renderShoppingCart, quantityShoppingCartItem, renderSubMenu } from './render__Html.js';


// console.log(renderSubMenu);

function renderTotalCard() {
    let localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

    document.querySelector('.cart-total__quantity').innerText = localCart.length
}
renderTotalCard()


// Render tổng tiền 1 sản phẩm và nhiều sản phẩm
function cartTotals() {
    const productPrice = document.querySelectorAll('.product-price')
    const productPriceSale = document.querySelectorAll('.product-price__sale')
    const editQuantity = document.querySelectorAll('.edit_quantity')
    const totalMoney = document.querySelectorAll('.product-total__money')

    totalMoney.forEach((e, index) => {
        let money = productPriceSale[index].dataset.price ?
            (productPriceSale[index].dataset.price * editQuantity[index].value) :
            (productPrice[index].dataset.price * editQuantity[index].value)

        e.innerText = formatCurrency(money);
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

    document.querySelector('.total-payment').value = formatCurrency(totalMoneyCart)
}


// Tăng giảm số lượng sản phẩm và giới hạn số sản phẩm
function hendleClickQuantity() {
    const editQuantity = document.querySelectorAll('.edit_quantity')

    editQuantity.forEach(e => {
        e.onchange = () => {
            const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

            // if (localCart.length > 0) {
            const cartItem = localCart.find(value => value.code === e.dataset.code);

            if (cartItem) {

                if (e.value <= 20) {
                    cartItem.id = cartItem.id;
                    cartItem.code = cartItem.code;
                    cartItem.quantity = e.value;
                    localStorage.setItem('local-cart', JSON.stringify(localCart));
                    // renderShoppingCart()
                    renderTotalCard()
                    cartTotals()
                } else {
                    console.log("vui lòng liên hệ với quản trị viên để đặt hàng số lượng lớn");
                    e.value = 20;
                }

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

function showSuccessToast(message) {
    toast({
        title: "Thành công!",
        message: message,
        type: "success",
        duration: 5000
    });
}

function showErrorToast(message) {
    toast({
        title: "Thất bại!",
        message: message,
        type: "error",
        duration: 5000
    });
}


function formatCurrency(money) {
    let formattedMoney = money.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    return formattedMoney;
}



// console.log(addCart);

function hendleClickAddToCart() {
    const addCart = document.querySelectorAll('.add-to__cart');
    console.log(addCart);
    if (addCart) {
        addCart.forEach((item) => {
            item.addEventListener('click', () => {
                const id = item.dataset.id;
                const code = item.dataset.code;

                const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

                const cartItem = localCart.find(value => value.code === code);

                if (cartItem) {
                    cartItem.id = id;
                    cartItem.code = code;
                    cartItem.quantity = cartItem.quantity;
                    localStorage.setItem('local-cart', JSON.stringify(localCart));
                    showErrorToast("Sản phẩm đã tồn tại")
                    renderTotalCard()
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
                    showSuccessToast("Thêm sản phẩm thành công")
                    renderTotalCard()
                }
            })
        })
    }
}


export {
    renderTotalCard,
    cartTotals,
    hendleClickQuantity,
    showSuccessToast,
    showErrorToast,
    formatCurrency,
    hendleClickAddToCart
}
