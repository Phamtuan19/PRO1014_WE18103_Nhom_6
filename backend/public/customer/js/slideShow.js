
// slideshow chạy && hiệu ứng thay đổi background khi hover vào nút mũi tên
<<<<<<< HEAD
function slideshow() {
    const image = $('.img-responsive');
    // console.log(image);

    let currIndex = 0;

    const arrayList =
        [
            './box/img/banner-1.jpg',
            './box/img/banner-2.png',
            './box/img/banner-3.jpg'
        ]
    image.attributes.src.nodeValue = arrayList[currIndex];


    function nextAuto() {
        currIndex === arrayList.length - 1 ? currIndex = 0 : currIndex++;
        image.attributes.src.nodeValue = arrayList[currIndex];
    }

    $('.next').onclick = function () {
        nextAuto();
    }

    $('.prev').onclick = function () {
        currIndex === 0 ? currIndex = arrayList.length - 1 : currIndex--;
        image.attributes.src.nodeValue = arrayList[currIndex];
=======
export function slideshow(arrayList) {
    const image = document.querySelector('.image_product__detail');
console.log(image);
    let currIndex = 0;
    console.log(arrayList.data);

    image.attributes.src.nodeValue = arrayList.data[currIndex].image_url;

    function nextAuto() {
        currIndex === arrayList.data.length - 1 ? currIndex = 0 : currIndex++;
        image.attributes.src.nodeValue = arrayList.data[currIndex].image_url;
    }

    const next = document.querySelector('.next')
    next.onclick = function () {
        nextAuto();
    }

    const prev = document.querySelector('.prev')
    prev.onclick = function () {
        currIndex === 0 ? currIndex = arrayList.data.length - 1 : currIndex--;
        image.attributes.src.nodeValue = arrayList.data[currIndex].image_url;
>>>>>>> c18aca6963a188d67f7026e69577a35d8c5c076c
    }

    setInterval(function () {
        nextAuto();
    }, 3000);
<<<<<<< HEAD
}
=======
}
>>>>>>> c18aca6963a188d67f7026e69577a35d8c5c076c
