
import { enpointUrl } from "../../service/index.js";

const post_list = document.querySelector('.post_list');
const post_top__view = document.querySelector('.post_top__view');

fetch('http://127.0.0.1:8000/api/bai-viet')
    .then(function (response) {
        return response.json('')
    })
    .then(function (data) {
        renderList(data.postNew);
        rederPostView(data.topView)

    })



function renderList(data) {
    post_list.innerHTML = data.map(e => {
        return `
            <div class="featured">
                <a class="featured_fluid" href="${enpointUrl.postItem(e.slug)}">
                    <div class="set-bg post__item_image"
                        style="background-image: url(${e.image_url})">
                    </div>

                    <div class="overlay">
                        <h3>${e.title}</h3>
                        <p>${e.introduction}</p>
                        <div class="d-flex gap-3">
                            <p>${e.user_name}</p>
                            <p>${e.created_at}</p>
                            <p>view: ${e.view === null ? 0 : e.view}</p>
                        </div>
                    </div>
                </a>
            </div>
        `
    }).join('')
}

function rederPostView(data) {
    post_top__view.innerHTML = data.map((e) => {
        return `
            <a class="featured_fluid" href="${enpointUrl.postItem(e.slug)}">
                <div class="set-bg"
                    style="flex: 0.3; margin-right: 12px; background-image: url(${e.image_url})">
                </div>

                <div class="overlay" style="gap: 10px;">
                    <h3 class="top_view__name">${e.title}</h3>
                    <p class="post__introduction" style="font-size: 0.9rem;">${e.introduction}</p>
                    <div class="d-flex flex-wrap" style="gap: 12px; color: #111111; ">
                        <p style="font-size: 0.9rem;">${e.user_name}</p>
                        <p style="font-size: 0.9rem;">${e.created_at}</p>
                        <p style="font-size: 0.9rem;">view: ${e.view === null ? 0 : e.view}</p>
                    </div>
                </div>
            </a>
        `
    }).join('')
}


