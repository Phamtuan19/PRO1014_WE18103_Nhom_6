
// slideshow chạy && hiệu ứng thay đổi background khi hover vào nút mũi tên
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
    }

    setInterval(function () {
        nextAuto();
    }, 3000);
}
