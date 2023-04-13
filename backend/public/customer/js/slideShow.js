
// // slideshow chạy && hiệu ứng thay đổi background khi hover vào nút mũi tên

// const arrayList = [
//     'https://book365.vn/upload/resize_cache/iblock/4f0/950_290_1/4f0558744f4e4797ee554882fdaae33c.jpg',
//     'https://book365.vn/upload/resize_cache/iblock/62c/950_290_1/62ca20282dc5fe64b2ce32480f1523e4.png',
//     'https://book365.vn/upload/resize_cache/iblock/59c/950_290_1/59cb7d6365c2cc89ece83671d912638b.jpg'
// ]

// function slideshow() {
//     const image = document.querySelector('.image_product__detail');
//     console.log(image);
//     let currIndex = 0;
//     console.log(arrayList);

//     image.attributes.src.nodeValue = arrayList[currIndex];

//     function nextAuto() {
//         currIndex === arrayList.data.length - 1 ? currIndex = 0 : currIndex++;
//         image.attributes.src.nodeValue = arrayList[currIndex];
//     }

//     const next = document.querySelector('.next')
//     next.onclick = function () {
//         nextAuto();
//     }

//     const prev = document.querySelector('.prev')
//     prev.onclick = function () {
//         currIndex === 0 ? currIndex = arrayList.data.length - 1 : currIndex--;
//         image.attributes.src.nodeValue = arrayList[currIndex];
//     }

//     setInterval(function () {
//         nextAuto();
//     }, 3000);
// }

// export default slideshow
