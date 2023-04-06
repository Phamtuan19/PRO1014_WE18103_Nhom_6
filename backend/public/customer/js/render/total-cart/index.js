function renderTotalCard() {
    let localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

    document.querySelector('.cart-total__quantity').innerText = localCart.length
}

export default renderTotalCard
