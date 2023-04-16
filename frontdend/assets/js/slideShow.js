function slideshow() {
    const image = $('.img-responsive');
    // console.log(image);

    let currIndex = 0;

    const arrayList = ['./box/img/banner-1.jpg', './box/img/banner-2.png', './box/img/banner-3.jpg'];
    image.attributes.src.nodeValue = arrayList[currIndex];

    function nextAuto() {
        currIndex === arrayList.length - 1 ? (currIndex = 0) : currIndex++;
        image.attributes.src.nodeValue = arrayList[currIndex];
    }

    $('.next').onclick = function () {
        nextAuto();
    };

    $('.prev').onclick = function () {
        currIndex === 0 ? (currIndex = arrayList.length - 1) : currIndex--;
        image.attributes.src.nodeValue = arrayList[currIndex];
    };

    setInterval(function () {
        nextAuto();
    }, 3000);
}
