
import { enpointUrl } from "../../service/index.js";

const post_item__detail = document.querySelector('.post_item__detail');

const slug = ((window.location.pathname)).split('/')
let postId;

fetch('http://127.0.0.1:8000/api/bai-viet/' + slug[2])
    .then(function (response) {
        return response.json('')
    })
    .then(function (data) {
        console.log(data);
        postId = data[0].id;
        renderPostItem(data);
    })

function renderPostItem(data) {
    post_item__detail.innerHTML = data.map((e) => {
        return `
            <div class="">
                <div class="news-name">${e.title}</div>
                <div>
                    <span>${e.user_name}</span>
                    <span class="date">${e.created_at}</span>
                    <span class="date">lượt xem: ${e.view === null ? 0 : e.view}</span>
                </div>
            </div>
            <div class="news_detail">
                ${e.content}
            </div>
        `
    }).join('')
}

setTimeout(() => {
    const offsetHeight = (document.documentElement.offsetHeight) / 2;
    console.log(offsetHeight);
    callApiView(offsetHeight)
}, 2000)
function callApiView(offsetHeight) {
    let isCheck = false;
    window.addEventListener('scroll', () => {
        if (Number(window.scrollY) >= Number(offsetHeight)) {
            console.log(Number(window.scrollY) >= Number(offsetHeight));
            if (isCheck === false) {
                console.log(isCheck);
                isCheck = true;
                fetch('http://127.0.0.1:8000/api/view-post/' + postId, {
                    method: "PATCH",
                })
                    .then(function (response) {
                        return response.json('');
                    })
                    .then(function (data) {
                        console.log(data);
                    })
            }
        }
    })
}
