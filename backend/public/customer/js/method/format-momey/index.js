function formatCurrency(money) {
    let formattedMoney = money.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    return formattedMoney;
}

export default formatCurrency
