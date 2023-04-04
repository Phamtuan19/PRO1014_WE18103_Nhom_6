import {formatCurrency} from '../../method/index.js';


// Render tổng tiền 1 sản phẩm và nhiều sản phẩm
function cartTotalsMoney() {
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

export default cartTotalsMoney