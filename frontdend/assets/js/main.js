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
var clicks = 0;

function onClick() {
    clicks += 1;
    document.getElementById('count').innerHTML = clicks;
}
