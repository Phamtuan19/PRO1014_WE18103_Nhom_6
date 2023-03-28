// slideshow banner
var counter = 1;
setInterval(function () {
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if (counter > 3) {
        counter = 1;
    }
}, 3000);
// slideshow product
('use strict');

productScroll();

function productScroll() {
    let slider = document.getElementById('slider');
    let next = document.getElementsByClassName('fa-chevron-right');
    let prev = document.getElementsByClassName('fa-chevron-left');
    let slide = document.getElementById('slide');
    let item = document.getElementById('slide');

    for (let i = 0; i < next.length; i++) {
        //refer elements by class name

        let position = 0; //slider postion

        prev[i].addEventListener('click', function () {
            //click previos button
            if (position < 0) {
                //avoid slide left beyond the first item
                position -= 1;
                translateX(position); //translate items
            }
        });

        next[i].addEventListener('click', function () {
            if (position >= 0 && position < hiddenItems()) {
                //avoid slide right beyond the last item
                position += 1;
                translateX(position); //translate items
            }
        });
    }

    function hiddenItems() {
        //get hidden items
        let items = getCount(item, false);
        let visibleItems = slider.offsetWidth / 210;
        return items - Math.ceil(visibleItems);
    }
}

function translateX(position) {
    //translate items
    slide.style.left = position * -210 + 'px';
}

function getCount(parent, getChildrensChildren) {
    //count no of items
    let relevantChildren = 0;
    let children = parent.childNodes.length;
    for (let i = 0; i < children; i++) {
        if (parent.childNodes[i].nodeType != 3) {
            if (getChildrensChildren) relevantChildren += getCount(parent.childNodes[i], true);
            relevantChildren++;
        }
    }
    return relevantChildren;
}

/* Scroll To Top */
let mybutton = document.getElementById('myBtn');

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = 'block';
    } else {
        mybutton.style.display = 'none';
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
function myFunction() {
    var element = document.body;
    element.classList.toggle('dark-mode');
}

/* Count cart header */
// var idProduct = document.getElementsByClassName('item-child');
// for (var i = 0; i <= idProduct.length; i++) {
//     idProduct += i;
// }
// var clicks = 0;

// function onClick() {
//     clicks += 1;
//     alert('Thêm sản phẩm thành công');
//     document.getElementById('count').innerHTML = clicks;
// }
// open cart modal
window.onload = function () {
    const cart = document.querySelector('#cart');
    const cartModalOverlay = document.querySelector('.cart-modal-overlay');

    cart.addEventListener('click', () => {
        if (cartModalOverlay.style.transform === 'translateX(-200%)') {
            cartModalOverlay.style.transform = 'translateX(0)';
        } else {
            cartModalOverlay.style.transform = 'translateX(-200%)';
        }
    });
    // end of open cart modal

    // close cart modal
    const closeBtn = document.querySelector('#close-btn');

    closeBtn.addEventListener('click', () => {
        cartModalOverlay.style.transform = 'translateX(-200%)';
    });

    cartModalOverlay.addEventListener('click', (e) => {
        if (e.target.classList.contains('cart-modal-overlay')) {
            cartModalOverlay.style.transform = 'translateX(-200%)';
        }
    });
    // end of close cart modal

    // add products to cart
    const addToCart = document.getElementsByClassName('add-to-cart');
    const productRow = document.getElementsByClassName('product-row');

    for (var i = 0; i < addToCart.length; i++) {
        button = addToCart[i];
        button.addEventListener('click', addToCartClicked);
    }

    function addToCartClicked(event) {
        button = event.target;
        var cartItem = button.closest('.item-child');
        var price = cartItem.getElementsByClassName('discount')[0].innerText;

        var imageSrc = cartItem.getElementsByClassName('product-image')[0].src;
        addItemToCart(price, imageSrc);
        updateCartPrice();
    }

    function addItemToCart(price, imageSrc) {
        var productRow = document.createElement('div');
        productRow.classList.add('product-row');
        var productRows = document.getElementsByClassName('product-rows')[0];
        var cartImage = document.getElementsByClassName('cart-image');

        for (var i = 0; i < cartImage.length; i++) {
            if (cartImage[i].src == imageSrc) {
                alert('Sản phẩm này đã có trong giỏ hàng0');
                return;
            }
        }

        var cartRowItems = `
  <div class="product-row">
        <img class="cart-image" src="${imageSrc}" alt="">
        <span class ="cart-price">${price} </span>
        <input class="product-quantity" type="number" value="1">
        <button class="remove-btn">Remove</button>
        </div>
        
      `;
        productRow.innerHTML = cartRowItems;
        productRows.append(productRow);
        productRow.getElementsByClassName('remove-btn')[0].addEventListener('click', removeItem);
        productRow.getElementsByClassName('product-quantity')[0].addEventListener('change', changeQuantity);
        updateCartPrice();
    }
    // end of add products to cart

    // Remove products from cart
    const removeBtn = document.getElementsByClassName('remove-btn');
    for (var i = 0; i < removeBtn.length; i++) {
        button = removeBtn[i];
        button.addEventListener('click', removeItem);
    }

    function removeItem(event) {
        btnClicked = event.target;
        btnClicked.parentElement.parentElement.remove();
        updateCartPrice();
    }

    // update quantity input
    var quantityInput = document.getElementsByClassName('product-quantity')[0];

    for (var i = 0; i < quantityInput; i++) {
        input = quantityInput[i];
        input.addEventListener('change', changeQuantity);
    }

    function changeQuantity(event) {
        var input = event.target;
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updateCartPrice();
    }
    // end of update quantity input

    // update total price
    function updateCartPrice() {
        var total = 0;
        for (var i = 0; i < productRow.length; i += 2) {
            cartRow = productRow[i];
            var priceElement = cartRow.getElementsByClassName('cart-price')[0];
            var quantityElement = cartRow.getElementsByClassName('product-quantity')[0];
            var price = parseFloat(priceElement.innerText.replace('$', ''));
            var quantity = quantityElement.value;
            total = total + price * quantity;
        }
        document.getElementsByClassName('total-price')[0].innerText = total + ' VNĐ';

        document.getElementsByClassName('cart-quantity')[0].textContent = i /= 2;
    }
    // end of update total price

    // purchase items
    const purchaseBtn = document.querySelector('.purchase-btn');

    const closeCartModal = document.querySelector('.cart-modal');

    purchaseBtn.addEventListener('click', purchaseBtnClicked);

    function purchaseBtnClicked() {
        alert('Cảm ơn bạn đã đặt hàng');
        cartModalOverlay.style.transform = 'translateX(-100%)';
        var cartItems = document.getElementsByClassName('product-rows')[0];
        while (cartItems.hasChildNodes()) {
            cartItems.removeChild(cartItems.firstChild);
        }
        updateCartPrice();
    }
};
// end of purchase items

//alert user if cart is empty
