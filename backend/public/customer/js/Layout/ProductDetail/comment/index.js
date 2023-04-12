

import { validation } from "../../../method/index.js";
import renderComment from "../reder/comment.js";

const btn_comment = document.querySelector('.user-button');
const comment_content = document.querySelector('.comment_content');

const authUser = localStorage.getItem('authUser') ? JSON.parse(localStorage.getItem('authUser')) : null;

function comment(productId) {
    if (authUser) {
        btn_comment.onclick = () => {
            // validation(['required'], comment_content, 'Nội dung bình luận')
            if (validation(['required'], comment_content, 'Nội dung bình luận')) {
                const comment = comment_content.value;

                const data = {
                    'user_id': authUser.user.id,
                    productId,
                    comment,
                }

                fetch('http://127.0.0.1:8000/api/binh-luan', {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${authUser.token}`
                    },
                    body: JSON.stringify(data)
                })
                    .then(function (response) {
                        return response.json('');
                    })
                    .then(function (data) {
                        callApiComment()
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            }

        }
    }
}

function callApiComment() {

    const productId = document.querySelector('.product__name').dataset.productid;
    console.log(productId);
    fetch('http://127.0.0.1:8000/api/binh-luan/' + productId, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${authUser.token}`
        },
    })
        .then(function (response) {
            return response.json('');
        })
        .then(function (data) {
            renderComment(data);
        })
        .catch(function (error) {
            console.log(error);
        })
}


export { callApiComment, comment }


